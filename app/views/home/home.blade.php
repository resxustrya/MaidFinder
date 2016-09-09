@extends('home.layout')

@section('content')
  <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large pink accent-3">
      <i class="large material-icons">share</i>
    </a>
    <ul>
      <li><a class="btn-floating indigo darken-2"><i class="mdi mdi-facebook"></i></a></li>
      <li><a class="btn-floating light-blue "><i class="mdi mdi-twitter"></i></a></li>
      <li><a class="btn-floating  light-blue darken-4"><i class="mdi mdi-linkedin"></i></a></li>
      <li><a class="btn-floating red"><i class="mdi mdi-instagram"></i></a></li>
    </ul>
  </div>
  <div id="index-banner" class="parallax-container landing">
    <div class="transbg">
      <div class="section no-pad-bot ">
        <div class="container">
          <h3 class="header center text-white transbgText animated fadeIn" style="margin-top: 20%">Look up for a maid near you</h3>
          <div class="row center">
            <h6 class="grey-lighten-5-text smlText">MaidFinderPH is a platform for home care service finder for employer and job seeker.</h6>
          </div>
          <div class="row center">
            <a  class="btn-large light-blue darken-1 waves-effect waves-light animated bounceInUp" href="{{ asset('helpers') }}">START Finder</a>
          </div>
          <br><br>
        </div>
      </div>
    </div>

    <div class="parallax bg cta-background"></div>
  </div>


  <div class="container">
    <div class="section">
      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
          <h3 class="center">How does it work?</h3>
          <div class="divider blue"></div>

        </div>

        <div class="col s12 m4">
          <div class="large icon-block">
            <h2 class="center brown-text"><img height="100"  class="animated fadeIn"  src="{{ asset('public/images/city.png') }}" /></h2>
            <h5 class="justify">Use our search to tell us what you need. See the profile of available maids or job in your city or area.</h5>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><img height="100"   src="{{ asset('public/images/shortlist.png') }}" /></h2>
            <h5 class="justify">View the complete profile of the available maids or the jobs and shortlist as per your preferences.</h5>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><img height="100"   src="{{ asset('public/images/contact.png') }}" /></h2>
            <h5 class="justify">Contact to the applied job or hired employee upon notifying them by clicking the Apply or Hire Button. You can get each contact number or send message through the app.</h5></div>
        </div>
      </div>

    </div>
  </div>
  <div class="divider"></div>
  <div class="parallax-container parallax-1">
    <div class="parallax"></div>
  </div>
  <div class="section white">
    <div class="row container">
      <h2 class="header">Find The Right For You!</h2>
      <p class="grey-text text-darken-3 lighten-3">MaidFinderPH is a platform for home care service finder for employer and job seeker.</p>
    </div>
  </div>
  <div class="section white">
    <div class="row container">
      <h2 class="header">Matching!</h2>
      <p class="grey-text text-darken-3 lighten-3"> This platform allows matching base on your provided details. Create your job ad post and you will see suggested employee vise verse with employee to employer.</p>
    </div>
  </div>
  <div class="parallax-container parallax-2">
    <div class="parallax"></div>
  </div>
  <div class="section grey lighten-4">
    <div class="container">
      <div class="row">
        <div class="col s6" style="border-right: 1px solid #ccc">
          <h4>Keep your free time free</h4>
          <h5>Let you free time be yours free from hastle on house chores.</h5>
        </div>
        <div class="col s6">

          <h4>See the near job to your place</h4>

          <h5><img src="{{ asset('public/semantic/assets/img/bg1.jpg') }}" class="circle" height="30" width="30" alt="">Find job that near to your love once no need to get far to have a job.</h5>
        </div>
      </div>
    </div>
  </div>
  <div class="section white">
    <div class="container offset-s2 ">
      <div class="row ">
        <h4 class="header center">WE'RE HAPPY TO HEAR FROM YOU</h4>
        <div class="container">
          <div class="row">
            <form class="col s12">
              <div class="row">
                <div class="input-field col s6">
                  <input id="name" type="text" class="validate">
                  <label for="text">Name</label>
                </div>
                <div class="row">
                  <div class="input-field col s6">
                    <input id="email" type="email" class="validate">
                    <label for="email">Email</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input  type="text" class="validate">
                  <label >Message</label>
                </div>
              </div>
              <div class="row">
                <div class="center col s12">
                  <button class="btn waves-effect waves-light blue darken-1" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                  </button>
                </div>

              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@stop

@section('js')

@stop

@section('css')
  @parent
  <style>
    .bg {
      opacity: 0.7;
    }
  </style>
@stop