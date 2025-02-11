<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    @include('backend.style')
</head>

<body class="body">
    <div id="wrapper">
        <div id="page" class="">
            <div class="layout-wrap">

                <!-- <div id="preload" class="preload-container">
                        <div class="preloading">
                            <span></span>
                        </div>
                    </div> -->
                @include('backend.sidber')


                <div class="section-content-right">
                    @include('backend.header')

                    @yield('content')
                    

                </div>
            </div>
        </div>
    </div>

    @include('backend.script')
</body>

</html>