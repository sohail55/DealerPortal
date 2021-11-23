<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Services;

/**
 * Description of Complaint
 *
 * @author 
 */

use App\Http\Services\Config;
use Illuminate\Support\Facades\Redirect;

class User extends Config
{
    public function updateStatus($request, $id)
    {
        $user = $this->getUserById($id);

        if ($user['role_id'] === '4' && $request->status === "B") {
            $hasCases = $this->hasAgentCurrentCase($id);
            if (!empty($hasCases['agentTotalOpenCase']['total'])) {
                return Redirect::back()->with('error_message', trans("messages.statusUpdatedErr"));
            }
        }

        $user->status = $request->status;
        $user->save();

        return Redirect::back()->with('success_message', trans("messages.statusUpdated"));
    }

    public function hasAgentCurrentCase($id)
    {
        return $this->getUserModel()->getAgentCurrentCase($id);
    }

    public function updateMonitoring($request, $id)
    {
        $user = $this->getUserById($id);
        $user->is_monitor = boolval($request->switch);
        $user->save();

        $session_msg = $request->switch === "0" ? trans("messages.monitoringStopped") : trans("messages.monitoringActivated");
        
        return Redirect::back()->with('success_message', $session_msg);
    }


    public function loadStatusModal($id)
    {
        $user = $this->getUserById($id);
        return view('modals.statusModal', compact('user'));
    }

    public function loadMonitorModal($id)
    {
        $user = $this->getUserById($id);
        return view('modals.monitoringModal', compact('user'));
    }
}
