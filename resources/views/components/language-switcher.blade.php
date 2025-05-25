  <!--Language Switcher-->
  <li class="dropdown dropdown-language nav-item">
      <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">
          <i class="flag-icon flag-icon-{{ LaravelLocalization::getCurrentLocale() == 'en' ? 'gb' : 'eg' }}"></i>
          <span class="selected-language"></span>
      </a>
      <div class="dropdown-menu" aria-labelledby="dropdown-flag">
          @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
              <a class="dropdown-item" hreflang="{{ $localeCode }}"
                  href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                  <i class="flag-icon flag-icon-{{ $localeCode == 'en' ? 'gb' : 'eg' }}"></i>
                  {{ $properties['native'] }}
              </a>
          @endforeach
      </div>
  </li>
