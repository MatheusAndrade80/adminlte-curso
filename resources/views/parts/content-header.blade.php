<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <!-- Verifica se a seção "page-title" está definida -->
            @hasSection('page-title')
                <div class="col-sm-6">
                    <h3 class="mb-0">@yield('page-title')</h3>
                </div>
            @else
                <div class="col-sm-6">
                    <h3 class="mb-0">Dashboard</h3>
                    @isset($breadcrumbs)
                        <ol class="breadcrumb float-sm-end">
                            @foreach ($breadcrumbs as $breadcrumb)
                                <li class="breadcrumb-item">
                                    <a href="#">{{ $breadcrumb['label'] }}</a>
                                </li>
                            @endforeach
                        </ol>
                    @endisset
                </div>
            @endif

            <div class="col-sm-6 text-end">
                @yield('page-actions')
            </div>
        </div>
    </div>
</div>
