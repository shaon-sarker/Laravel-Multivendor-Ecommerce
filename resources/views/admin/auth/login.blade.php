<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Xadmino - Responsive Admin Dashboard Template</title>
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
    />
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link
      rel="shortcut icon"
      href="{{ asset('backend/assets/images/favicon.ico') }}"
    />

    <link
      href="{{ asset('backend/assets/css/bootstrap.min.css') }} "
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="{{ asset('backend/assets/css/icons.css') }}"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="{{ asset('backend/assets/css/style.css') }} "
      rel="stylesheet"
      type="text/css"
    />
  </head>
  <body>
    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="wrapper-page">
      <div class="panel panel-color panel-primary panel-pages">
        <div class="panel-body">
          <h3 class="text-center m-t-0 m-b-30">
            <span class=""
              ><img
                src="{{ asset('backend/assets/images/logo_dark.png') }}"
                alt="logo"
                height="32"
            /></span>
          </h3>
          <h4 class="text-muted text-center m-t-0"><b>Sign In</b></h4>

          <form
            class="form-horizontal m-t-20"
            action="{{ route('admin.login') }}"
            method="POST"
          >
            @csrf
            <div class="form-group">
              <div class="col-xs-12">
                <input
                  class="form-control"
                  type="text"
                  required=""
                  placeholder="Email"
                  name="email"
                />
              </div>
            </div>

            <div class="form-group">
              <div class="col-xs-12">
                <input
                  class="form-control"
                  type="password"
                  required=""
                  placeholder="Password"
                  name="password"
                />
              </div>
            </div>

            <div class="form-group">
              <div class="col-xs-12">
                <div class="checkbox checkbox-primary">
                  <input id="checkbox-signup" type="checkbox" />
                  <label for="checkbox-signup"> Remember me </label>
                </div>
              </div>
            </div>

            <div class="form-group text-center m-t-20">
              <div class="col-xs-12">
                <button
                  class="btn btn-primary w-md waves-effect waves-light"
                  type="submit"
                >
                  Log In
                </button>
              </div>
            </div>

            <div class="form-group m-t-30 m-b-0">
              <div class="col-sm-7">
                <a href="pages-recoverpw.html" class="text-muted"
                  ><i class="fa fa-lock m-r-5"></i> Forgot your password?</a
                >
              </div>
              <div class="col-sm-5 text-right">
                <a href="pages-register.html" class="text-muted"
                  >Create an account</a
                >
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- jQuery  -->
    <script src="{{ asset('backend/assets/js/jquery.min.js') }}   "></script>
    <script src="{{ asset('backend/assets/js/bootstrap.min.js') }}   "></script>
    <script src="{{ asset('backend/assets/js/modernizr.min.js') }}   "></script>
    <script src="{{ asset('backend/assets/js/detect.js') }}   "></script>
    <script src="{{ asset('backend/assets/js/fastclick.js') }}   "></script>
    <script src="{{ asset('backend/assets/js/jquery.slimscroll.js') }}   "></script>
    <script src="{{ asset('backend/assets/js/jquery.blockUI.js') }}   "></script>
    <script src="{{ asset('backend/assets/js/waves.js') }}   "></script>
    <script src="{{ asset('backend/assets/js/wow.min.js') }}   "></script>
    <script src="{{ asset('backend/assets/js/jquery.nicescroll.js') }}  "></script>
    <script src="{{ asset('backend/assets/js/jquery.scrollTo.min.js') }}   "></script>

    <script src="{{ asset('backend/assets/js/app.js') }}"></script>
  </body>
</html>
