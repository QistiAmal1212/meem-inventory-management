<?php

use App\Events\BranchSelected;
use Illuminate\Support\Facades\Session;

it('stores branch_id in session when user change branch or login', function () {

    Session::flush();

    event(new BranchSelected(123));

    expect(session('branch_id'))->toBe(123);
});
