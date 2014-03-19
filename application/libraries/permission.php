<?php

class permission {
    public static function parsePermissions($permissions) {
        $permObj = array();
        
        foreach ($permissions as $perm) {
            $permission = array();
            
            $permission["read"] = $perm->PmsRea > 0;
            $permission["write"] = $perm->PmsWrt > 0;
            $permission["edit"] = $perm->PmsEdt > 0;
            $permission["delete"] = $perm->PmsDel > 0;
            
            $permObj[$perm->PmsDepCod] = $permission;
        }
        
        return $permObj;
    }
}
