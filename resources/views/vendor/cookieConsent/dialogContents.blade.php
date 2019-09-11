<div class="js-cookie-consent cookie-consent alert alert-dismissible text-center cookiealert show fixed-bottom" role="alert" style="background: black; border-radius: 0px; margin-bottom: 0px;">
    <div class="cookiealert-container" style="color: white;">
        {!! trans('cookieConsent::texts.message') !!}

        <button type="button" class="btn btn-primary btn-sm acceptcookies js-cookie-consent-agree cookie-consent__agree"  aria-label="Close" style="margin-left: 10px;">
            {{ trans('cookieConsent::texts.agree') }}
        </button>
    </div>
</div>