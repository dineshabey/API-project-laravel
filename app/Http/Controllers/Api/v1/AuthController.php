<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Auth\User;
use App\Repositories\Backend\Auth\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Validator;
use GuzzleHttp\Client as GuzzleClient;

/**
 * Class AuthController.
 *
 * @author Rakitha Dissanayake <rakithadd@gmail.com>
 */
class AuthController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * UserController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Login user and create token
     *
     * @param   $request
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return  mixed
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'meta' => [
                    'status' => 'false',
                    'status_message' => 'Validation errors found.',
                    'errors' => $validator->messages()
                ],
            ], 200);
        }

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'meta' => [
                    'status' => 'false',
                    'status_message' => 'Invalid Email name or Password'
                ],
            ], 200);
        } else {
            $user = Auth::getLastAttempted();

            if ($user->active) {
                $permissions = $user->getAllPermissions()->pluck('name')->toArray();

                //issue token for updated user with permissions
                $tokenResult = $user->createToken('Personal Access Token', $permissions);
                //return token and  user data
                return response()->json([
                    'meta' => [
                        'status' => 'true',
                        'status_message' => 'Successfully logged in'
                    ],
                    'authentication_data' => [
                        'access_token' => $tokenResult->accessToken,
                        'token_type' => 'Bearer',
                        'expires_at' => Carbon::parse(
                            $tokenResult->token->expires_at
                        )->toDateTimeString()
                    ],
                    /*'user_data' => [
                        'user_id' => $user->id,
                        'full_name' => $user->full_name,
                        'email' => $user->email,
                        'contact_number' => $user->contact_number,
                        'epf' => '',
                        'last_login_at' => $user->last_login_at,
                        'last_login_ip' => $user->last_login_ip,
                    ]*/
                    'user_data' => [
                        'user_id' => $user->id,
                        'agent_code' => 'E660',
                        'user_role' => $user->user_role,
                        'full_name' => $user->full_name,
                        'email' => $user->email,
                        'contact_number' => $user->contact_number,
                        'epf' => '',
                        'last_login_at' => $user->last_login_at,
                        'last_login_ip' => $user->last_login_ip,
                        'permissions' => $user->getAllPermissions()->pluck('name')->toArray()
                    ],
                ], 200);
            } else {
                return response()->json([
                    'meta' => [
                        'status' => 'false',
                        'status_message' => 'Inactive user. Please contact administrator.'
                    ],
                ], 200);
            }
        }
    }

    public function eBuddyLogin(Request $request)
    {
        $result = null;

        $validator = Validator::make($request->all(), [
            'agentCode' => 'required|string',
            'logToken' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'meta' => [
                    'status' => 'false',
                    'status_message' => 'Validation errors found.',
                    'errors' => $validator->messages()
                ],
            ], 200);
        }

        //Extract credentials from request
        $credentials = request(['agentCode', 'logToken']);

        //Set headers
        $headers = [
            'Content-Type' => 'application/json',
        ];

        try {
            //Make guzzel request
            $client = new GuzzleClient([
                'headers' => $headers
            ]);

            $r = $client->request('GET', "https://salesforce.hnbassurance.com/GetAgentInfo", [
                'body' => json_encode($credentials)
            ]);

            //Extract response content
            $response = $r->getBody()->getContents();
            $result = json_decode($response);
        } catch (\Exception $e) {
            return response()->json([
                'meta' => [
                    'status' => 'false',
                    'status_message' => 'Ebuddy authentication service not working.',
                    'errors' => $e->getMessage()
                ],
            ], 200);
        }

        if ($result->result) {

            $user = User::where('agent_code', $result->result[0]->agent_code)->first();

            if ($user) {

                $user = Auth::loginUsingId($user->id);

                //update ebuddy data
                $user = $this->userRepository->ebuddyUpdate($user, [
                    'password' => $credentials['logToken'],
                    'agent_code' => $result->result[0]->agent_code,
                    'apitoken' => $result->result[0]->apitoken,
                    'user_role' => $result->result[0]->user_role,
                    'user_category' => $result->result[0]->user_category,
                    'datelog' => $result->result[0]->datelog,
                    'statuslog' => $result->result[0]->statuslog,
                    'branchcode' => $result->result[0]->branchcode,
                    'clustercode' => $result->result[0]->clustercode,
                    'zonecode' => $result->result[0]->zonecode,
                    'usertype' => $result->result[0]->usertype,
                    'channelid' => $result->result[0]->channelid
                ]);

                $user->syncRoles($result->result[0]->user_role);

                $permissions = $user->getAllPermissions()->pluck('name')->toArray();

                //issue token for updated user with permissions
                $tokenResult = $user->createToken('Personal Access Token', $permissions);

                //return token and  user data
                return response()->json([
                    'meta' => [
                        'status' => 'true',
                        'status_message' => 'Successfully logged in'
                    ],
                    'authentication_data' => [
                        'access_token' => $tokenResult->accessToken,
                        'token_type' => 'Bearer',
                        'expires_at' => Carbon::parse(
                            $tokenResult->token->expires_at
                        )->toDateTimeString()
                    ],
                    'user_data' => [
                        'agent_code' => $user->agent_code
                    ],
                    'user_data' => [
                        'agent_code' => $user->agent_code,
                        'permissions' => $user->getAllPermissions()->pluck('name')->toArray()
                    ]
                ], 200);
            } else {

                //update ebuddy data to make sure we have the latest
                $user = $this->userRepository->ebuddyCreate([
                    'password' => $credentials['logToken'],
                    'agent_code' => $result->result[0]->agent_code,
                    'apitoken' => $result->result[0]->apitoken,
                    'user_role' => $result->result[0]->user_role,
                    'user_category' => $result->result[0]->user_category,
                    'datelog' => $result->result[0]->datelog,
                    'statuslog' => $result->result[0]->statuslog,
                    'branchcode' => $result->result[0]->branchcode,
                    'clustercode' => $result->result[0]->clustercode,
                    'zonecode' => $result->result[0]->zonecode,
                    'usertype' => $result->result[0]->usertype,
                    'channelid' => $result->result[0]->channelid
                ]);

                $user->syncRoles([$result->result[0]->user_role]);
                $permissions = $user->getAllPermissions()->pluck('name')->toArray();

                //issue token for updated user with permissions
                $tokenResult = $user->createToken('Personal Access Token', $permissions);

                //return token and  user data
                return response()->json([
                    'meta' => [
                        'status' => 'true',
                        'status_message' => 'Successfully logged in'
                    ],
                    'authentication_data' => [
                        'access_token' => $tokenResult->accessToken,
                        'token_type' => 'Bearer',
                        'expires_at' => Carbon::parse(
                            $tokenResult->token->expires_at
                        )->toDateTimeString()
                    ],
                    'user_data' => [
                        'agent_code' => $user->agent_code,
                        'permissions' => $user->getAllPermissions()->pluck('name')->toArray()
                    ]
                ], 200);
            }
        } else {

            return response()->json([
                'meta' => [
                    'status' => 'false',
                    'status_message' => 'Authentication error. Please contact your system administrator.',
                    'errors' => "User couldn't find!"
                ],
            ], 200);
        }
    }

    /**
     * Logout user (Revoke the token)
     *
     * @param   $request
     * @return mixed
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'meta' => [
                'status' => 'true',
                'status_message' => 'Successfully logged out'
            ],
        ], 200);
    }
}
