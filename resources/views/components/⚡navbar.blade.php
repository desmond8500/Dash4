<?php

use Livewire\Component;
// use WithFileUploads;

new class extends Component
{

    public $menu1 = array(
        array('name' => "ERP", "icon" => "users", "can"=>"erp",
            'submenu' => [
                array('name' => "Clients", "route" => "clients", "icon" => "users", "can" => "clients"),
                array('name' => "Modèle de devis", "route" => "invoice_model", "icon" => "file"),
                array('name' => "Documents", "route" => "documents", "icon" => "file"),
                array('name' => "Devis", "route" => "invoicelist", "icon" => "file"),
                array('name' => "Devis Resume", "route" => "invoice_resume", "icon" => "file"),
                array('name' => "Système", "route" => "systemes", "icon" => "settings"),
                array('name' => "Journaux", "route" => "journaux", "icon" =>"article", "can" => "journaux"),
                array('name' => "Finances", "route" => "finances", "icon" => "coins", "can" => "finances"),
                array('name' => "Equipe", "route" => "team", "icon" => "users", "can" => ""),
                array('name' => "Forfaits", "route" => "forfaits", "icon" => "receipt", "can" => ""),
                array('name' => "Plannings", "route" => "plannings", "icon" => "receipt", "can" => ""),
                // array('name' => "Timeline", "route" => "timeline", "icon" => "list", "can" => ""),
            ]
        ),
        array('name' => "Stock", "icon" => "packages", "can"=> "stock",
            'submenu' => [
                array('name' => "Stock", "route" => "stock", "icon" => "packages", "can" => "stock"),
                array('name' => "Articles", "route" => "articles", "icon" => "packages", "can" => "stock"),
                array('name' => "Achats", "route" => "achats", "icon" => "brand-cake", "can" => "stock"),
                array('name' => "Marques", "route" => "brands", "icon" => "brand-cake", "can" => "stock"),
                array('name' => "Fournisseurs", "route" => "providers", "icon" => "building", "can" => "stock"),
                array('name' => "Types", "route" => "article_types", "icon" => "building", "can" => "stock"),
            ]
        ),
        array('name' => "Test", "route" => "test", "icon" => "hammer", "can"=> "test"),
        array('name' => "Medias", "icon" => "photo", "can"=> "medias",
            'submenu' => [
                array('name' => "Images", "route" => "images", "icon" => "photo"),
                array('name' => "Vidéos", "route" => "videos", "icon" => "video"),
            ]
        ),
        array('name' => "Tableaux", "icon" => "dashboard", "can"=> "erp",
            'submenu' => [
            array('name' => "Liens rapides", "route" => "dashboard1", "icon" => "dashboard"),
            array('name' => "Recherche", "route" => "dashboard2", "icon" => "dashboard"),
            ]
        ),
        array('name' => "Perso", "icon" => "dashboard", "can"=> "erp",
            'submenu' => [
            array('name' => "Mes Projets", "route" => "myprojects", "icon" => "circle"),
            ]
        ),
    );



    // Register
    public UserForm $user_form;
    public $formtype = true;

    function register(){

        $this->user_form->store();
        $this->user_form->reset();
        $this->dispatch('close-register');
    }

    public $email;
    public $password;
    public $errorMessage;

    function login(){
        $this->validate([
            'email' => 'required|email|exists:App\Models\User,email',
            'password' => 'required'
        ]);

        $login = $this->user_form->login($this->email, $this->password);
        if ($login) {
            $this->reset('email','password', 'errorMessage');
            $this->dispatch('close-login');
            return redirect()->intended('/');
        } else {
           $this->errorMessage ='Les identifiants sont incorrects';
        }

    }

    function logout(){
        $this->user_form->logout();
    }
};
?>

<div>

    <header class="navbar navbar-expand-md d-print-none sticky-top ">
        <div class="container-xl">
            <!-- BEGIN NAVBAR TOGGLER -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation"> <span
                    class="navbar-toggler-icon"></span>
            </button>
            <!-- END NAVBAR TOGGLER -->
            <!-- BEGIN NAVBAR LOGO -->
            <div class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                <a href="{{ route('welcome') }}" wire:navigate>
                    {{ env('APP_NAME', 'Tabler') }}
                </a>
            </div>
            <!-- END NAVBAR LOGO -->
            <div class="navbar-nav flex-row order-md-last">

                <div class="nav-item dropdown">
                    @auth
                        <a href="#" class="nav-link d-flex lh-1 p-0 px-2" data-bs-toggle="dropdown" aria-label="Open user menu">
                            <img src="{{ asset($user->avatar) }}" alt="A" class="avatar avatar-sm border border-secondary">
                            <div class="d-none d-xl-block ps-2">
                                <div>{{ $user->firstname }} {{ $user->lastname }}</div>
                                <div class="mt-1 small text-secondary">{{ $user->function ?? '_' }}</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            {{-- <a href="{{ route('profile') }}" class="dropdown-item"><i class="ti ti-user"></i>
                                Profile</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('settings') }}" class="dropdown-item"><i class="ti ti-settings"></i>
                                Paramètres</a> --}}
                            <a wire:click="logout()" class="dropdown-item text-danger"> <i class="ti ti-logout"></i>
                                Déconnexion</a>
                        </div>
                    @else
                        <div class="nav-item ">
                            <div class="btn-list">
                                <a class="btn btn-primary" href="{{ route('login') }}" wire:navigate>Connexion</a>
                                <a class="btn btn-light" href="{{ route('register') }}" wire:navigate>Inscription</a>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                    <!-- BEGIN NAVBAR MENU -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('welcome') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <i class="ti ti-home"></i>
                                </span>
                                <span class="nav-link-title"> Acceuil </span>
                            </a>
                        </li>

                        @auth
                            @foreach ($menus as $menu)
                                @can($menu['can'])
                                    @isset ($menu['submenu'])
                                        <li class="nav-item dropdown" wire:key="{{ $menu['name'] }}">
                                            <a class="nav-link dropdown-toggle" href="#navbar-third" data-bs-toggle="dropdown"
                                                data-bs-auto-close="outside" role="button" aria-expanded="false">
                                                <span class="nav-link-title text-dark">
                                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                        <i class="ti ti-{{ $menu['icon'] }}"></i>
                                                    </span>
                                                    {{ $menu['name'] }}
                                                </span>
                                            </a>
                                            <div class="dropdown-menu">
                                                @foreach ($menu['submenu'] as $submenu)
                                                <a class="dropdown-item" href="{{ route($submenu['route']) }}">
                                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                        <i class="ti ti-{{ $submenu['icon'] }}"></i>
                                                    </span>
                                                    {{ $submenu['name'] }}
                                                </a>
                                                @endforeach
                                            </div>
                                        </li>
                                    @else
                                        <li class="nav-item" wire:key="{{ $menu['name'] }}">
                                            <a class="nav-link" href="{{ route($menu['route']) }}">
                                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                    <i class="ti ti-{{ $menu['icon'] }}"></i>
                                                </span>
                                                <span class="nav-link-title"> {{ $menu['name'] }} </span>
                                            </a>
                                        </li>
                                    @endisset
                                @endcan
                            @endforeach
                        @endauth

                    </ul>
                </div>
            </div>
        </div>

        <a id="top"></a>

    </header>
</div>
