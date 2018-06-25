@extends('layouts.main')

@section('content')
{{--  <div id="loader-container" class="col-xs-12 no-padding">
    <div class="both-centered">
        <img src="/Content/img/about/35.gif" />
        <p>@{{ "Loader" | translate }}</p>
    </div>
</div>  --}}
<div ng-include="'/Partials/Home.html'" id="home"></div>

  <div ng-include="'/Partials/videos.html'" id="portefolio" class="col-xs-12"></div>  

  <div ng-controller="Skills" ng-include="'/Partials/Skills.html'" id="competencias" class="col-xs-12"></div>  

<div id="sobre" ng-controller="About" ng-include="'/Partials/About.html'" class="col-xs-12"></div>

<div ng-controller="Contacts" ng-include="'/Partials/Contacts.html'" id="contactos" class="col-xs-12"></div>    

@endsection