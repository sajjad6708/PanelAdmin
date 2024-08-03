<!doctype html>
<html lang="fa" dir="ltr">
<head>

    @include('emails.layouts.head-tag')
    @yield('head-tag')

</head>
<body>


    <body style="font-family: Helvetica, Arial, sans-serif; margin: 0px; padding: 0px; background-color: #ffffff;">
        <table role="presentation"
          style="width: 100%; border-collapse: collapse; border: 0px; border-spacing: 0px; font-family: Arial, Helvetica, sans-serif; background-color: rgb(239, 239, 239);">
          <tbody>
            <tr>
              <td align="center" style="padding: 1rem 2rem; vertical-align: top; width: 100%;">
                <table role="presentation" style="max-width: 600px; border-collapse: collapse; border: 0px; border-spacing: 0px; text-align: left;">
                  <tbody>
                    <tr>
                      <td style="padding: 40px 0px 0px;">
                        @yield('content')
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
      </body>
      
      </html>

    <!-- end main one col -->


    <!-- start footer -->
    @include('emails.layouts.footer')
    <!-- end footer -->

</body>
</html>