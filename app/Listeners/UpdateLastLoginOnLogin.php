<?php

namespace csi\Listeners;

use Carbon\Carbon;

class UpdateLastLoginOnLogin
{
	public function handle($user, $remember)
	{
		return response()->view('errors.custom', [], 500);
		// $user->last_login_at = Carbon::now();

		// $user->save();
	}
}