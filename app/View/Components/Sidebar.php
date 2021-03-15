<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;


class Sidebar extends Component
{

    public $activeTab;
    public $adminSidebar;

    public function __construct($activeTab = 'home',$adminSidebar = true)
    {
        $this->activeTab = $activeTab;
        $this->adminSidebar = Auth::user()->is_admin;
    }

    public function tabStyle($name) {
        $py = $this->adminSidebar ? 'py-2' : 'py-4';

        $base_class = "flex items-center text-white $py pl-6 nav-item";
        if( $name === $this->activeTab ) {
            return $base_class . ' active-nav-link';
        } else {
            return $base_class . ' opacity-75 hover:opacity-100';
        }
    }

    public function render()
    {
        return view('components.admin-panel.sidebar');
    }
}
