
<div class="js-cookie-consent cookie-consent" >
    <style>
        .btn-cookies-accept{
            font-family: segouil;
            font-weight: 100;
            background-color: #82bd01;
            border: none;
            border-radius: 25px;
            margin-left: 5%;
            min-width: 200px;
        }
        .btn-cookies-accept:hover{
            background-color: #4286f5
        }
        .btn-cookies-refuse{
            font-family: segouil;
            font-weight: 100;
            background-color: #f35220;
            border: none;
            border-radius: 25px;
            margin-left: 5%;
            min-width: 200px;
        }
        .btn-cookies-refuse:hover{
            background-color: #FFBB02
        }
    </style>
    <div class="modal" id="modalcookies" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" style="font-family: segouil;font-weight: 100;font-size: 2em">Vie privée et cookies</h5>
            </div>
            <div class="modal-body" style="font-family: segouil">
                {!! trans('cookieConsent::texts.message') !!}
            </div>
            <div class="modal-footer">
              <button type="button" class="js-cookie-consent-agree cookie-consent__agree btn btn-success btn-cookies-accept">Accepter</button>
              <button type="button" class="btn btn-success btn-cookies-refuse" data-dismiss="modal">Refuser</button>
            </div>
          </div>
        </div>
      </div>
{{--
    <div class="row justify-content-center">
        <div class="col-md-6">
            <span class="cookie-consent__message">
                {!! trans('cookieConsent::texts.message') !!}
            </span>

            <button class="js-cookie-consent-agree cookie-consent__agree btn btn-success btn-cookies">
                {{ trans('cookieConsent::texts.agree') }}
            </button>
        </div>

    </div>  --}}
</div>
