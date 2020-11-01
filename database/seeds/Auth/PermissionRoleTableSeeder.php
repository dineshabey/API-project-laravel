<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Create Roles
        $admin = Role::create(['name' => config('access.users.admin_role')]);

        $HDONBD = Role::create([
            'name' => 'HDONBD',
            'description' => 'Head office user at New Business department',
        ]);
        $HDOCSC = Role::create([
            'name' => 'HDOCSC',
            'description' => 'Head office users at sales admin ( Advisor channel)',
        ]);
        $HDOSAB = Role::create([
            'name' => 'HDOSAB',
            'description' => 'Head office users at sales admin ( Bancassurance channel)',
        ]);
        $ZOMGR = Role::create([
            'name' => 'ZOMGR',
            'description' => 'Zonal manager',
        ]);
        $UWR = Role::create([
            'name' => 'UWR',
            'description' => 'Undewriter attached to the zonal office',
        ]);
        $REMGR = Role::create([
            'name' => 'REMGR',
            'description' => 'Cluster manager',
        ]);
        $BRMGR = Role::create([
            'name' => 'BRMGR',
            'description' => 'Branch manager',
        ]);
        $BANCC = Role::create([
            'name' => 'BANCC',
            'description' => 'Bancassurance cluster in charge',
        ]);
        $HDOALT = Role::create([
            'name' => 'HDOALT',
            'description' => 'Alternate channel User',
        ]);
        $MGR = Role::create([
            'name' => 'MGR',
            'description' => 'Administrator',
        ]);
        $SUP = Role::create([
            'name' => 'SUP',
            'description' => 'Super Administrator',
        ]);
        $ADV = Role::create([
            'name' => 'ADV',
            'description' => 'Advisor',
        ]);

        // Create Permissions
        $permissions = [
            'view-backend',
            'search-quote',
            'view-quote',
            'create-quote',
            'edit-quote',
            'ex-loading'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // ALWAYS GIVE ADMIN ROLE ALL PERMISSIONS
        $admin->givePermissionTo(Permission::all());

        $SUP->givePermissionTo(Permission::all());

        $HDONBD->givePermissionTo([
            'search-quote',
            'view-quote',
            'create-quote',
            'edit-quote'
        ]);

        $HDOCSC->givePermissionTo([
            'search-quote',
            'view-quote',
            'create-quote',
            'edit-quote'
        ]);

        $HDOSAB->givePermissionTo([
            'search-quote',
            'view-quote',
            'create-quote',
            'edit-quote'
        ]);

        $ZOMGR->givePermissionTo([
            'search-quote',
            'view-quote',
            'create-quote',
            'edit-quote'
        ]);

        $UWR->givePermissionTo([
            'search-quote',
            'view-quote',
            'create-quote',
            'edit-quote'
        ]);

        $REMGR->givePermissionTo([
            'search-quote',
            'view-quote',
            'create-quote',
            'edit-quote'
        ]);

        $BRMGR->givePermissionTo([
            'search-quote',
            'view-quote',
            'create-quote',
            'edit-quote'
        ]);

        $BANCC->givePermissionTo([
            'search-quote',
            'view-quote',
            'create-quote',
            'edit-quote'
        ]);

        $HDOALT->givePermissionTo([
            'search-quote',
            'view-quote',
            'create-quote',
            'edit-quote'
        ]);

        $MGR->givePermissionTo([
            'search-quote',
            'view-quote',
            'create-quote',
            'edit-quote'
        ]);

        $SUP->givePermissionTo([
            'search-quote',
            'view-quote',
            'create-quote',
            'edit-quote'
        ]);

        $ADV->givePermissionTo([
            'search-quote',
            'view-quote',
            'create-quote',
            'edit-quote'
        ]);

        $this->enableForeignKeys();
    }
}
