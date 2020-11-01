<?php

namespace App\Repositories\Backend\Common;

use App\Models\File;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class FileRepository.
 */
class FileRepository extends BaseRepository
{
    /**
     * FileRepository constructor.
     *
     * @param  Data  $model
     */

    /**
     * @return string
     */
    public function model()
    {
        return File::class;
    }

    /**
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Throwable
     * @return Data
     */
    public function store(array $data): File
    {
        return DB::transaction(function () use ($data) {
            $saveStab = $this->buildSaveStab($data);
            $data = $this->model->create($saveStab);

            if ($data) {
                return $data;
            } else {
                return false;
            }
        });
    }

    /**
     * @param string $refNo
     *
     * @throws GeneralException
     * @throws \Throwable
     * @return Mixed
     */
    public function getFilesByRefNo($refNo)
    {
        return $this->model->where('ref_no', $refNo)->get();
    }

    /**
     * Build quotation data save array
     *
     * @param array $data
     * @param array $moi
     * @return  array
     */
    private function buildSaveStab($data): array
    {
        $saveData = [];
        $saveData['ref_no'] = $data['ref_no'];
        $saveData['name'] = isset($data['name']) ? $data['name'] : '';
        $saveData['size'] = isset($data['size']) ? $data['size'] : '';
        $saveData['extension'] = isset($data['extension']) ? $data['extension'] : '';
        $saveData['url'] = isset($data['url']) ? $data['url'] : '';
        $saveData['proposal_upload_type_id'] = isset($data['proposal_upload_type_id']) ? $data['proposal_upload_type_id'] : '';

        return $saveData;
    }
}
