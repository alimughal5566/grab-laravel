@extends('user.master')
@section('title', $gs->websiteTitle)

<style type="text/css">
/*-------

   Slider

-------*/
.mbr-slider .carousel-inner > .active,
.mbr-slider .carousel-inner > .next,
.mbr-slider .carousel-inner > .prev {
    display: table;
}
.mbr-slider .carousel-control {
    background-image: none;
    width: 54px;
    height: 54px;
    top: 50%;
    margin-top: -27px;
    line-height: 54px;
    border: 2px solid #fff;
    opacity: 1;
    text-shadow: none;
    z-index: 5;
    -webkit-transition: all 0.2s ease-in-out 0s;
    -o-transition: all 0.2s ease-in-out 0s;
    transition: all 0.2s ease-in-out 0s;
}
.mbr-slider .carousel-control.left {
    margin-left: 20px;
}
.mbr-slider .carousel-control.right {
    margin-right: 20px;
}
.mbr-slider .carousel-control:hover {
    background: #fff;
    color: #000;
}
.mbr-slider .carousel-indicators {
    bottom: 20px;
}
.mbr-slider .carousel-indicators li,
.mbr-slider .carousel-indicators .active {
    width: 15px;
    height: 15px;
    margin: 3px;
    border: 2px solid #ffffff;
}

@media (max-width: 767px) {
    .mbr-slider .carousel-control {
        top: auto;
        bottom: 20px;
    }
}
.mbr-slider .mbr-overlay {
    z-index: 0;
    opacity:0.5;
}
/* boxed model */
.mbr-slider > .boxed-slider {
    position: relative;
    padding: 93px 0;
}
.mbr-slider > .container .carousel-indicators {
    margin-bottom: 93px;
}
@media (max-width: 767px) {
    .mbr-slider > .container .carousel-control {
        margin-bottom: 93px;
    }
}
.mbr-slider > .container img {
    width: 100%;
}
.mbr-slider > .container img + .row {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    margin-left: 0;
    margin-right: 0;
    -webkit-transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    transform: translateY(-50%);
}
.mbr-slider .mbr-section {
    padding-left: 0;
    padding-right: 0;
}

/* article layout */
.mbr-slider .article-slider > div {
    padding-left: 0;
    padding-right: 0;
}
.mbr-slider > .container.article-slider .carousel-indicators {
    margin-bottom: 0;
}

.is-builder .animated {
  -webkit-animation-name: none !important;
  animation-name: none !important;
}
html {
  position: relative;
  min-height: 100%;
}
.mbr-embedded-video {
  position: relative;
}
.mbr-background-video,
.mbr-background-video-preview {
  bottom: 0;
  left: 0;
  overflow: hidden;
  position: absolute;
  right: 0;
  top: 0;
}
.mbr-parallax-background,
.mbr-background {
  background-attachment: fixed !important;
  background-position: 50% 0;
  background-repeat: no-repeat;
  background-size: cover !important;
}
.mbr-hidden-scrollbar .mbr-parallax-background {
  background-size: auto 130%;
}
.mobile .mbr-parallax-background {
  background-attachment: scroll !important;
}
.mbr-background {
  background-attachment: scroll !important;
}
.mbr-navbar {
  position: relative;
  width: 100%;
}
.mbr-navbar:before {
  content: "";
  display: block;
}
.mbr-navbar__brand-link:after,
.mbr-navbar__brand-img {
  max-height: 74px;
}
.mbr-navbar:before,
.mbr-navbar__container {
  height: 98px;
}
.mbr-navbar--ss .mbr-navbar__brand-link:after,
.mbr-navbar--ss .mbr-navbar__brand-img {
  height: 74px;
}
.mbr-navbar--ss:before,
.mbr-navbar--ss .mbr-navbar__container {
  height: 98px;
}
.mbr-navbar--xs .mbr-navbar__brand-link:after,
.mbr-navbar--xs .mbr-navbar__brand-img {
  height: 32px;
}
.mbr-navbar--xs:before,
.mbr-navbar--xs .mbr-navbar__container {
  height: 56px;
}
.mbr-navbar--s .mbr-navbar__brand-link:after,
.mbr-navbar--s .mbr-navbar__brand-img {
  height: 48px;
}
.mbr-navbar--s:before,
.mbr-navbar--s .mbr-navbar__container {
  height: 72px;
}
.mbr-navbar--m .mbr-navbar__brand-link:after,
.mbr-navbar--m .mbr-navbar__brand-img {
  height: 64px;
}
.mbr-navbar--m:before,
.mbr-navbar--m .mbr-navbar__container {
  height: 88px;
}
.mbr-navbar--l .mbr-navbar__brand-link:after,
.mbr-navbar--l .mbr-navbar__brand-img {
  height: 96px;
}
.mbr-navbar--l:before,
.mbr-navbar--l .mbr-navbar__container {
  height: 120px;
}
.mbr-navbar--xl .mbr-navbar__brand-link:after,
.mbr-navbar--xl .mbr-navbar__brand-img {
  height: 128px;
}
.mbr-navbar--xl:before,
.mbr-navbar--xl .mbr-navbar__container {
  height: 152px;
}
.mbr-navbar--short .mbr-navbar__brand-link:after,
.mbr-navbar--short .mbr-navbar__brand-img {
  height: 40px;
}
.mbr-navbar--short:before,
.mbr-navbar--short .mbr-navbar__container {
  height: 64px;
}
.mbr-navbar--short .mbr-navbar__container {
  padding: 12px 0;
}
@media (max-width: 767px) {
  .mbr-navbar--short .mbr-navbar__brand-link:after,
  .mbr-navbar--short .mbr-navbar__brand-img {
    height: 31px;
  }
  .mbr-navbar--short:before,
  .mbr-navbar--short .mbr-navbar__container {
    height: 45px;
  }
  .mbr-navbar--short .mbr-navbar__container {
    padding: 7px 0;
  }
}
.mbr-navbar__brand-img {
  position: relative;
}
.mbr-navbar__brand-img,
.mbr-navbar__container,
.mbr-navbar__section {
  -webkit-transition: all 300ms ease-in-out 0s;
  -o-transition: all 300ms ease-in-out 0s;
  transition: all 300ms ease-in-out 0s;
}
.mbr-navbar__section {
  background: #2c2c2c;
  height: auto;
  position: absolute;
  top: 0;
  width: 100%;
  z-index: 1000;
}
.mbr-navbar__container {
  display: table;
  padding: 12px 0;
  width: 100%;
}
.mbr-navbar__menu-box {
  display: table;
  width: 100%;
}
.mbr-navbar__menu-box--inline-left,
.mbr-navbar__menu-box--inline-center,
.mbr-navbar__menu-box--inline-right {
  display: block;
  text-align: left;
}
.mbr-navbar__menu-box--inline-center {
  text-align: center;
}
.mbr-navbar__menu-box--inline-right {
  text-align: right;
}
.mbr-navbar__column {
  display: table-cell;
  vertical-align: middle;
}
.mbr-navbar__column--xxs {
  width: 1%;
}
.mbr-navbar__column--xs {
  width: 10%;
}
.mbr-navbar__column--s {
  width: 20%;
}
.mbr-navbar__column--m {
  width: 30%;
}
.mbr-navbar__column--l {
  width: 40%;
}
.mbr-navbar__column--xl {
  width: 50%;
}
.mbr-navbar__menu-box--inline-left .mbr-navbar__column,
.mbr-navbar__menu-box--inline-center .mbr-navbar__column,
.mbr-navbar__menu-box--inline-right .mbr-navbar__column {
  display: inline-block;
}
.mbr-navbar__items {
  float: left;
  padding-left: 0px;
  position: relative;
  left: -20px;
}
.mbr-navbar__items--right {
  float: right;
  left: 0;
}
.mbr-navbar__item {
  display: block;
  float: left;
  position: relative;
}
.mbr-navbar__hamburger {
  display: none;
  margin-top: -11px;
  position: absolute;
  right: 0;
  top: 50%;
  z-index: 10000;
}
.mbr-navbar--collapsed .mbr-navbar__container {
  position: relative;
}
.mbr-navbar--collapsed .mbr-navbar__column {
  display: block;
  width: 100%;
}
.mbr-navbar--collapsed .mbr-navbar__items--right {
  padding-top: 13px;
}
.mbr-navbar--collapsed .mbr-navbar__menu {
  background: rgba(0, 0, 0, 0.9);
  display: none;
  height: 100%;
  left: 0;
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 9999;
}
.mbr-navbar--collapsed .mbr-navbar__menu-box {
  display: table-cell;
  vertical-align: middle;
}
.mbr-navbar--collapsed .mbr-navbar__items {
  float: none;
}
.mbr-navbar--collapsed .mbr-navbar__item {
  float: none;
}
.mbr-navbar--collapsed .mbr-navbar__hamburger {
  display: block;
}
.mbr-navbar--collapsed.mbr-navbar--open .mbr-navbar__menu {
  display: table;
}
.mbr-navbar--collapsed.mbr-navbar--open:not(.mbr-navbar--sticky) .mbr-navbar__section {
  background: none;
  position: fixed;
}
.mbr-navbar--collapsed.mbr-navbar--open .mbr-navbar__brand {
  visibility: hidden;
}
.mbr-navbar--collapsed.mbr-navbar--sticky.mbr-navbar--open .mbr-navbar__brand {
  visibility: visible;
}
.mbr-navbar--collapsed.mbr-navbar--open .mbr-navbar__brand-img,
.mbr-navbar--collapsed.mbr-navbar--open .mbr-navbar__container {
  -webkit-transition: none;
  -o-transition: none;
  transition: none;
}
.mbr-navbar--freeze.mbr-navbar--collapsed.mbr-navbar--open .mbr-navbar__hamburger,
.mbr-navbar--freeze.mbr-navbar--collapsed.mbr-navbar--open .mbr-navbar__hamburger:hover {
  color: #fff !important;
}
.mbr-navbar--sticky .mbr-navbar__section {
  position: fixed;
}
.mbr-navbar--absolute {
  position: absolute;
}
.mbr-navbar--transparent .mbr-navbar__section {
  background: none;
}
.mbr-navbar--stuck .mbr-navbar__section,
.mbr-navbar--relative .mbr-navbar__section {
  background: #2c2c2c;
}
@media (max-width: 991px) {
  .mbr-navbar--auto-collapse .mbr-navbar__container {
    position: relative;
  }
  .mbr-navbar--auto-collapse .mbr-navbar__column {
    display: block;
    width: 100%;
  }
  .mbr-navbar--auto-collapse .mbr-navbar__items--right {
    padding-top: 13px;
  }
  .mbr-navbar--auto-collapse .mbr-navbar__menu {
    background: rgba(0, 0, 0, 0.9);
    display: none;
    height: 100%;
    left: 0;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 9999;
  }
  .mbr-navbar--auto-collapse .mbr-navbar__menu-box {
    display: table-cell;
    vertical-align: middle;
  }
  .mbr-navbar--auto-collapse .mbr-navbar__items {
    float: none;
  }
  .mbr-navbar--auto-collapse .mbr-navbar__item {
    float: none;
  }
  .mbr-navbar--auto-collapse .mbr-navbar__hamburger {
    display: block;
  }
  .mbr-navbar--auto-collapse.mbr-navbar--open .mbr-navbar__menu {
    display: table;
  }
  .mbr-navbar--auto-collapse.mbr-navbar--open:not(.mbr-navbar--sticky) .mbr-navbar__section {
    background: none;
    position: fixed;
  }
  .mbr-navbar--auto-collapse.mbr-navbar--open .mbr-navbar__brand {
    visibility: hidden;
  }
  .mbr-navbar--auto-collapse.mbr-navbar--sticky.mbr-navbar--open .mbr-navbar__brand {
    visibility: visible;
  }
  .mbr-navbar--auto-collapse.mbr-navbar--open .mbr-navbar__brand-img,
  .mbr-navbar--auto-collapse.mbr-navbar--open .mbr-navbar__container {
    -webkit-transition: none;
    -o-transition: none;
    transition: none;
  }
}
.mbr-after-navbar:before {
  content: "";
  display: block;
  height: 98px;
}
.mbr-hamburger {
  cursor: pointer;
  height: 23px;
  width: 30px;
}
.mbr-hamburger:focus {
  outline: none;
}
.mbr-hamburger__line,
.mbr-hamburger__line:before,
.mbr-hamburger__line:after {
  content: "";
  position: absolute;
  display: block;
  height: 1px;
  cursor: pointer;
}
.mbr-hamburger__line,
.mbr-hamburger__line:before,
.mbr-hamburger__line:after {
  width: 30px;
  border-bottom: 5px solid;
  top: 9px;
}
.mbr-hamburger__line:before {
  top: -9px;
}
.mbr-hamburger__line:after {
  top: 9px;
}
.mbr-hamburger__line,
.mbr-hamburger__line:before,
.mbr-hamburger__line:after {
  -webkit-transition: all 300ms ease-in-out;
  transition: all 300ms ease-in-out;
}
.mbr-hamburger--open .mbr-hamburger__line {
  border-color: transparent;
}
.mbr-hamburger--open .mbr-hamburger__line:before,
.mbr-hamburger--open .mbr-hamburger__line:after {
  top: 0;
}
.mbr-hamburger--open .mbr-hamburger__line:before {
  -ms-transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
  transform: rotate(45deg);
}
.mbr-hamburger--open .mbr-hamburger__line:after {
  top: 10px;
  -ms-transform: translatey(-10px) rotate(-45deg);
  -webkit-transform: translatey(-10px) rotate(-45deg);
  transform: translatey(-10px) rotate(-45deg);
}
@media (max-width: 767px) {
  .mbr-hamburger {
    height: 23px;
    width: 27px;
  }
  .mbr-hamburger__line,
  .mbr-hamburger__line:before,
  .mbr-hamburger__line:after {
    width: 27px;
    border-bottom: 4px solid;
    top: 9px;
  }
  .mbr-hamburger__line:before {
    top: -9px;
  }
  .mbr-hamburger__line:after {
    top: 9px;
  }
}
.mbr-brand {
  display: block;
  float: left;
  position: relative;
}
.mbr-brand,
.mbr-brand:hover {
  text-decoration: none;
}
.mbr-brand__name {
  display: block;
  font-weight: bold;
  margin-top: 5px;
  text-align: center;
}
.mbr-brand__name,
.mbr-brand__name:hover {
  text-decoration: none;
}
.mbr-brand--inline {
  display: table;
}
.mbr-brand--inline:after {
  content: "";
  display: table-cell;
  width: 1px;
}
.mbr-brand--inline .mbr-brand__logo,
.mbr-brand--inline .mbr-brand__name {
  display: table-cell;
  vertical-align: middle;
}
.mbr-brand--inline .mbr-brand__logo {
  padding-right: 10px;
}
.mbr-brand--inline .mbr-brand__name {
  margin: 0;
  text-align: left;
}
.mbr-form {
  display: table;
  margin-top: -13px;
  position: relative;
  top: 14px;
  width: 100%;
}
.mbr-form__left,
.mbr-form__right {
  display: table-cell;
  vertical-align: top;
}
.mbr-form__left {
  padding-right: 3px;
}
.mbr-form__right {
  width: 1px;
}
@media (max-width: 530px) {
  .mbr-form {
    display: block;
    margin-top: -27px;
    position: relative;
    top: 26px;
  }
  .mbr-form__left,
  .mbr-form__right {
    display: block;
  }
  .mbr-form__left {
    margin-bottom: 12px;
    padding-right: 0;
  }
  .mbr-form__right {
    width: 100%;
  }
}
.mbr-section {
  padding: 0 20px;
}
.mbr-section--no-padding {
  padding: 0;
}
.mbr-section--relative {
  position: relative;
}
.mbr-section--fixed-size {
  overflow: hidden;
}
.mbr-section--full-height {
  height: 100vh;
}
.mbr-section--full-height.mbr-after-navbar:before {
  display: none;
}
.mbr-section--bg-adapted {
  background-attachment: scroll;
  background-position: 50% 0;
  background-repeat: no-repeat;
  background-size: cover;
}
.mbr-section--gray {
  background-color: #444444;
}
.mbr-section--light-gray {
  background-color: #f0f0f0;
}
.mbr-section--dark-gray {
  background-color: #3c3c3c;
}
.mbr-section__container {
  padding: 0;
  position: relative;
  z-index: 3;
}
.mbr-section__container--center {
  text-align: center;
}
.mbr-section__container--std-padding {
  padding: 93px 0;
}
.mbr-section__container--std-top-padding {
  padding-top: 93px;
}
.mbr-section__container--std-bot-padding {
  padding-bottom: 93px;
}
.mbr-section__container--sm-padding {
  padding: 41px 0;
}
.mbr-section__container--sm-top-padding {
  padding-top: 41px;
}
.mbr-section__container--sm-bot-padding {
  padding-bottom: 41px;
}
.mbr-section__container--isolated {
  padding-bottom: 93px;
  padding-top: 93px;
}
.mbr-section__container--first {
  padding-top: 93px;
  padding-bottom: 41px;
}
.mbr-section__container--middle {
  padding-bottom: 41px;
}
.mbr-section__container--last {
  padding-bottom: 93px;
}
.mbr-section__row {
  margin-left: -24px;
  margin-right: -24px;
}
.mbr-section__col {
  overflow: hidden;
  padding-left: 24px;
  padding-right: 24px;
}
.mbr-section__left {
  padding-right: 40px;
}
.mbr-section__right {
  padding-left: 15px;
}
.mbr-section__header {
  line-height: 1.5em;
  margin: -10px 0 0;
  text-align: center;
}
@media (min-width: 768px) {
  .mbr-section--short-paddings .mbr-section__container--std-padding {
    padding: 59px 0;
  }
  .mbr-section--short-paddings .mbr-section__container--std-top-padding {
    padding-top: 59px;
  }
  .mbr-section--short-paddings .mbr-section__container--std-bot-padding {
    padding-bottom: 59px;
  }
  .mbr-section--short-paddings .mbr-section__container--sm-padding {
    padding: 41px 0;
  }
  .mbr-section--short-paddings .mbr-section__container--sm-top-padding {
    padding-top: 41px;
  }
  .mbr-section--short-paddings .mbr-section__container--sm-bot-padding {
    padding-bottom: 41px;
  }
  .mbr-section--short-paddings .mbr-section__container--isolated {
    padding-bottom: 59px;
    padding-top: 59px;
  }
  .mbr-section--short-paddings .mbr-section__container--first {
    padding-top: 59px;
    padding-bottom: 41px;
  }
  .mbr-section--short-paddings .mbr-section__container--middle {
    padding-bottom: 41px;
  }
  .mbr-section--short-paddings .mbr-section__container--last {
    padding-bottom: 59px;
  }
}
@media (max-width: 767px) {
  .mbr-section__left {
    padding-right: 15px;
  }
  .mbr-section__right {
    padding-left: 15px;
    padding-top: 51px;
  }
}
.mbr-arrow {
  bottom: 71px;
  left: 0;
  line-height: 1px;
  padding: 0 20px;
  position: absolute;
  width: 100%;
  z-index: 3;
}
.mbr-arrow__link {
  display: inline-block;
  font-size: 26px;
}
.mbr-arrow__link,
.mbr-arrow__link:hover,
.mbr-arrow__link:focus {
  color: #fff;
}
.mbr-arrow--floating .mbr-arrow__link {
  -webkit-animation: floating-arrow 1.6s infinite ease-in-out 0s;
  -o-animation: floating-arrow 1.6s infinite ease-in-out 0s;
  animation: floating-arrow 1.6s infinite ease-in-out 0s;
}
@-webkit-keyframes floating-arrow {
  from {
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
  65% {
    -webkit-transform: translateY(11px);
    transform: translateY(11px);
  }
  to {
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
}
@-o-keyframes floating-arrow {
  from {
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
  65% {
    -webkit-transform: translateY(11px);
    transform: translateY(11px);
  }
  to {
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
}
@keyframes floating-arrow {
  from {
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
  65% {
    -webkit-transform: translateY(11px);
    transform: translateY(11px);
  }
  to {
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
}
.mbr-arrow--dark .mbr-arrow__link,
.mbr-arrow--dark .mbr-arrow__link:hover,
.mbr-arrow--dark .mbr-arrow__link:focus {
  color: #252525;
}
@media (max-width: 767px) {
  .mbr-arrow {
    bottom: 41px;
  }
}
@media (max-width: 320px) {
  .mbr-arrow {
    bottom: 21px;
    text-align: center;
  }
}
@media all and (device-width: 320px) and (device-height: 568px) and (orientation: portrait) {
  .mbr-arrow {
    bottom: 31px;
  }
}
.mbr-box {
  display: table;
  width: 100%;
}
.mbr-box--fixed {
  table-layout: fixed;
}
.mbr-box--stretched {
  height: 100%;
}
.mbr-box__magnet {
  display: table-cell;
  float: none;
  height: 100%;
  margin-bottom: 0;
  margin-top: 0;
  text-align: center;
  vertical-align: middle;
  background-color: rgba(0, 0, 0, 0.6);
}
.mbr-box__magnet--sm-padding {
  padding: 41px 0;
}
.mbr-box__magnet--top-left,
.mbr-box__magnet--top-center,
.mbr-box__magnet--top-right {
  vertical-align: top;
}
.mbr-box__magnet--bottom-left,
.mbr-box__magnet--bottom-center,
.mbr-box__magnet--bottom-right {
  vertical-align: bottom;
}
.mbr-box__magnet--top-left,
.mbr-box__magnet--center-left,
.mbr-box__magnet--bottom-left {
  text-align: left;
}
.mbr-box__magnet--top-right,
.mbr-box__magnet--center-right,
.mbr-box__magnet--bottom-right {
  text-align: right;
}
.mbr-box__container {
  height: 50%;
}
@media (max-width: 767px) {
  .mbr-box__container {
    height: 100%;
  }
  .mbr-box--adapted {
    display: block;
  }
  .mbr-box--adapted > .mbr-box__magnet {
    display: block;
    height: auto;
  }
}
.mbr-overlay {
  background: #222;
  bottom: 0;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  z-index: 2;
}
.mbr-google-map__marker {
  color: #252525;
  display: none;
  margin: 0;
}
.mbr-google-map--loaded .mbr-google-map__marker {
  display: block;
}
.mbr-hero {
  color: #fff;
  position: relative;
}
.mbr-hero__text {
  font-size: 46px;
  font-weight: bold;
  left: -2px;
  letter-spacing: 2px;
  line-height: 50px;
  margin: -18px 0 1px 0;
  padding-bottom: 41px;
  position: relative;
  top: 8px;
}
.mbr-hero__subtext {
  font-size: 21px;
  line-height: 29px;
  margin: -32px 0 3px 0;
  padding: 0 0 41px 0;
  position: relative;
  top: 6px;
  color:#fff;
}
.mbr-figure {
  display: inline-block;
  line-height: 1px;
  margin: 0;
  max-width: 100%;
  overflow: hidden;
  position: relative;
}
.mbr-figure--no-bg {
  background: none;
}
.mbr-figure--full-width {
  display: block;
  width: 100%;
}
.mbr-figure.mbr-after-navbar:before {
  display: none;
}
.mbr-figure--full-width iframe,
.mbr-figure--full-width .mbr-figure__img,
.mbr-figure--full-width .mbr-figure__map {
  width: 100%;
}
.mbr-figure iframe,
.mbr-figure__img,
.mbr-figure__map {
  max-width: 100%;
}
.mbr-figure__map {
  height: 400px;
  line-height: 1.3em;
}
.mbr-figure__map--short {
  height: 300px;
}
.mbr-figure__caption {
  background: rgba(0, 0, 0, 0.5);
  bottom: 0;
  color: #fff;
  display: block;
  font-size: 17px;
  left: 0;
  line-height: 1.3em;
  min-height: 53px;
  padding: 17px 20px;
  position: absolute;
  text-align: left;
  width: 100%;
}
.mbr-figure__caption--no-padding {
  padding: 17px 0;
}
.mbr-figure--wysiwyg .mbr-figure__caption a,
.mbr-figure--wysiwyg .mbr-figure__caption a:hover {
  color: inherit;
  text-decoration: underline;
}
.mbr-figure--caption-inside-top .mbr-figure__caption {
  bottom: auto;
  top: 0;
}
.mbr-figure--caption-outside-top .mbr-figure__caption,
.mbr-figure--caption-outside-bottom .mbr-figure__caption {
  background: none;
  position: relative;
}
.mbr-figure--no-bg.mbr-figure--caption-outside-top .mbr-figure__caption,
.mbr-figure--no-bg.mbr-figure--caption-outside-bottom .mbr-figure__caption {
  color: #252525;
}
.mbr-figure--no-bg.mbr-figure--caption-outside-top .mbr-figure__caption {
  margin-top: -3px;
  padding-top: 0;
}
.mbr-figure--no-bg.mbr-figure--caption-outside-bottom .mbr-figure__caption {
  margin-top: -2px;
  padding-bottom: 0;
  top: 2px;
}
.mbr-figure__caption--std-grid {
  background: none;
  z-index: 2;
}
@media (min-width: 768px) {
  .mbr-figure__caption--std-grid {
    width: 715px;
    left: 50%;
    margin-left: -357.5px;
    padding: 17px 0;
  }
}
@media (min-width: 992px) {
  .mbr-figure__caption--std-grid {
    width: 935px;
    margin-left: -467.5px;
  }
}
@media (min-width: 1200px) {
  .mbr-figure__caption--std-grid {
    width: 1150px;
    margin-left: -575px;
  }
}
.mbr-figure__caption--std-grid:before {
  bottom: 0;
  content: "";
  position: absolute;
  top: 0;
  width: 200%;
  z-index: -1;
  margin-left: -50%;
}
.mbr-figure--caption-inside-top .mbr-figure__caption--std-grid:before,
.mbr-figure--caption-inside-bottom .mbr-figure__caption--std-grid:before {
  background: rgba(0, 0, 0, 0.6);
}
.mbr-figure__caption-small {
  color: #ccc;
  display: block;
  font-size: 14px;
  line-height: 1.3em;
}
.mbr-figure--no-bg.mbr-figure--caption-outside-top .mbr-figure__caption-small,
.mbr-figure--no-bg.mbr-figure--caption-outside-bottom .mbr-figure__caption-small {
  color: #777;
}
@media (max-width: 767px) {
  .mbr-figure--adapted {
    display: block;
    width: 100%;
  }
  .mbr-figure--adapted iframe,
  .mbr-figure--adapted .mbr-figure__img,
  .mbr-figure--adapted .mbr-figure__map {
    width: 100%;
  }
  .mbr-figure--caption-inside-top .mbr-figure__caption,
  .mbr-figure--caption-inside-bottom .mbr-figure__caption {
    background: none;
    position: relative;
  }
  .mbr-figure--caption-inside-top .mbr-figure__caption--std-grid:before,
  .mbr-figure--caption-inside-bottom .mbr-figure__caption--std-grid:before {
    display: none;
  }
}
.mbr-reviews {
  list-style: none;
  margin: 0 -15px;
  padding: 3px 0 0 0;
}
.mbr-reviews__item {
  position: relative;
  margin-top: 39px;
}
.mbr-reviews__text {
  background: #fafafa;
  border-radius: 3px;
  border: 1px solid #ededed;
  color: #777;
  font-size: 16px;
  line-height: 26px;
  padding: 20px;
  position: relative;
}
.mbr-reviews__text:before {
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transform: rotate(45deg);
  width: 14px;
  height: 14px;
  background-color: #fafafa;
  border-color: #ededed;
  border-style: none solid solid none;
  border-width: 0 1px 1px 0;
  bottom: -8px;
  content: "";
  display: block;
  left: 50px;
  position: absolute;
}
.mbr-reviews__p {
  margin: 0;
}
.mbr-reviews__author {
  margin-top: 30px;
  padding-left: 102px;
  position: relative;
}
.mbr-reviews__author--short {
  margin-top: 27px;
  padding-left: 32px;
}
.mbr-reviews__author-img {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  left: 33px;
  position: absolute;
  top: 0;
}
.mbr-reviews__author-name {
  color: #777;
  font-size: 14px;
  font-weight: bold;
  position: relative;
  top: -3px;
}
.mbr-reviews__author-bio {
  color: #999;
  font-size: 12px;
}
@media (max-width: 767px) {
  .mbr-reviews__author {
    padding-bottom: 32px;
  }
  .mbr-reviews__author--short {
    padding-bottom: 1px;
  }
}
@media (min-width: 768px) and (max-width: 991px) {
  .mbr-reviews__item:nth-of-type(2n+1) {
    clear: left;
  }
}
@media (min-width: 992px) {
  .mbr-reviews__item:nth-of-type(3n+1) {
    clear: left;
  }
}
@media (max-width: 991px) {
  .mbr-header--reduce .mbr-header__text {
    padding-top: 1em;
    margin-top: -1em;
  }
}
.mbr-header {
  margin-top: -20px;
  padding: 0;
  position: relative;
  text-align: left;
  top: 10px;
}
.mbr-header--std-padding {
  padding-bottom: 41px;
}
.mbr-header--center {
  text-align: center;
}
.mbr-header__text {
  display: block;
  font-size: 25px;
  font-weight: bold;
  letter-spacing: 6px;
  line-height: 1.5em;
  margin: 0;
}
.mbr-header__subtext {
  color: #777;
  font-size: 14px;
  font-style: italic;
  letter-spacing: 1px;
  margin: 8px 0 7px 0;
}
.mbr-header--inline {
  margin-top: 0;
  padding: 41px 0 28px 0;
  top: 0;
}
.mbr-header--inline .mbr-header__text {
  letter-spacing: 4px;
  line-height: 1em;
  margin: 15px 0 0 0;
}
@media (max-width: 767px) {
  .mbr-header--inline {
    padding: 47px 0 38px 0;
  }
  .mbr-header--inline .mbr-header__text {
    display: block;
    margin: 0 0 38px 0;
  }
  .mbr-header--auto-align .mbr-header__text,
  .mbr-header--auto-align .mbr-header__subtext {
    left: 0;
    text-align: center !important;
  }
}
@media (min-width: 768px) {
  .mbr-header--reduce {
    margin-top: -5px;
    top: 2px;
  }
  .mbr-header--reduce .mbr-header__text {
    font-size: 16px;
    letter-spacing: 1px;
    line-height: 1.1em;
    padding-top: 0.4em;
    margin-top: -0.4em;
  }
}
.mbr-social-icons__icon {
  -webkit-transition: all 0.2s ease-in-out 0s;
  -o-transition: all 0.2s ease-in-out 0s;
  transition: all 0.2s ease-in-out 0s;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  font-size: 29px;
  height: 56px;
  line-height: 61px;
  margin: 0 10px 13px 0;
  position: relative;
  text-align: center;
  width: 56px;
}
.mbr-social-icons__icon:hover {
  color: #fff;
}
.mbr-social-icons--style-1 .mbr-social-icons__icon:hover {
  background: #252525 !important;
}
.mbr-contacts {
  color: #9c9c9c;
  font-size: 14px;
  line-height: 1.7em;
  padding: 45px 0 46px;
}
.mbr-contacts__img {
  max-width: 100%;
  margin: 6px 0 5px 40px;
}
.mbr-contacts__img--left {
  margin-left: 0;
}
.mbr-contacts__text {
  margin: 0;
}
.mbr-contacts__header {
  color: #fff;
  font-size: 14px;
  letter-spacing: 1px;
  margin-bottom: 20px;
  margin-top: 3px;
}
.mbr-contacts__list {
  list-style: none;
  margin: 0;
  padding: 0;
}
@media (max-width: 767px) {
  .mbr-contacts__img {
    margin-bottom: 10px;
  }
  .mbr-contacts__header {
    margin-top: 20px;
    margin-bottom: 10px;
  }
  .mbr-contacts__column {
    margin-top: 37px;
  }
}
.mbr-footer {
  color: #9c9c9c;
  font-size: 13px;
  letter-spacing: 1px;
  line-height: 1.5em;
  padding: 37px 0 39px;
  word-spacing: 1px;
}
.mbr-footer__copyright {
  margin: 0;
}
.mbr-buttons {
  margin: -26px 0 13px 0;
  position: relative;
  text-align: left;
  top: 26px;
}
.mbr-buttons__btn,
.mbr-buttons__link {
  margin: 0 10px 13px 0;
}
.mbr-buttons__btn,
.mbr-buttons__link,
.mbr-buttons__btn:hover,
.mbr-buttons__link:hover {
  text-decoration: none;
}
.mbr-buttons--top {
  top: 44px;
  margin-top: -62px;
}
.mbr-buttons--no-offset {
  margin-top: 0;
  top: 0;
}
.mbr-buttons--only-links {
  left: -20px;
}
.mbr-buttons--center {
  left: 5px;
  text-align: center;
}
.mbr-buttons--center.mbr-buttons--only-links {
  left: 0;
}
.mbr-buttons--right {
  text-align: right;
}
.mbr-buttons--right .mbr-buttons__btn,
.mbr-buttons--right .mbr-buttons__link {
  margin: 0 0 13px 10px;
}
.mbr-buttons--right.mbr-buttons--only-links {
  left: 20px;
}
.mbr-buttons--activated {
  left: 5px;
  text-align: center;
}
.mbr-buttons--activated .mbr-buttons__btn,
.mbr-buttons--activated .mbr-buttons__link {
  margin-left: 0;
  margin-right: 0;
}
.mbr-buttons--activated .mbr-buttons__link {
  font-size: 25px;
  padding: 10px 30px 2px;
}
.mbr-buttons--activated .mbr-buttons__btn {
  font-size: 15px;
  margin-top: 9px;
  padding: 15px 30px;
}
.mbr-buttons--freeze.mbr-buttons--activated .mbr-buttons__link {
  font-size: 25px !important;
}
.mbr-buttons--freeze.mbr-buttons--activated .mbr-buttons__link,
.mbr-buttons--freeze.mbr-buttons--activated .mbr-buttons__link:hover {
  color: #fff !important;
}
.mbr-buttons--freeze.mbr-buttons--activated .mbr-buttons__btn {
  font-size: 15px !important;
}
@media (max-width: 991px) {
  .mbr-buttons--active {
    left: 5px;
    text-align: center;
  }
  .mbr-buttons--active .mbr-buttons__btn,
  .mbr-buttons--active .mbr-buttons__link {
    margin-left: 0;
    margin-right: 0;
  }
  .mbr-buttons--active .mbr-buttons__link {
    font-size: 25px;
    padding: 10px 30px 2px;
  }
  .mbr-buttons--active .mbr-buttons__btn {
    font-size: 15px;
    margin-top: 9px;
    padding: 15px 30px;
  }
  .mbr-buttons--freeze.mbr-buttons--active .mbr-buttons__link {
    font-size: 25px !important;
  }
  .mbr-buttons--freeze.mbr-buttons--active .mbr-buttons__link,
  .mbr-buttons--freeze.mbr-buttons--active .mbr-buttons__link:hover {
    color: #fff !important;
  }
  .mbr-buttons--freeze.mbr-buttons--active .mbr-buttons__btn {
    font-size: 15px !important;
  }
}
@media (max-width: 767px) {
  .mbr-buttons--auto-align {
    left: 5px;
    margin-top: -26px;
    text-align: center;
    top: 26px;
  }
  .mbr-buttons--auto-align.mbr-buttons--only-links {
    left: 0;
  }
}
@media (max-width: 530px) {
  .mbr-buttons {
    left: 0;
  }
  .mbr-buttons__btn,
  .mbr-buttons__link,
  .mbr-buttons--right .mbr-buttons__btn,
  .mbr-buttons--right .mbr-buttons__link {
    display: inline-block;
    margin: 0 0 13px 0;
    text-align: center;
    width: 100%;
  }
  .mbr-buttons--activated .mbr-buttons__btn,
  .mbr-buttons--activated .mbr-buttons__link,
  .mbr-buttons--active .mbr-buttons__btn,
  .mbr-buttons--active .mbr-buttons__link {
    width: auto;
  }
  .mbr-buttons--activated .mbr-buttons__btn,
  .mbr-buttons--active .mbr-buttons__btn {
    margin-top: 9px;
  }
}
.mbr-article {
  color: #777;
  font-size: 17px;
  line-height: 27px;
  text-align: left;
  position: relative;
  margin-top: -21px;
  top: 14px;
}
.mbr-article--wysiwyg h1,
.mbr-article--wysiwyg h2,
.mbr-article--wysiwyg h3,
.mbr-article--wysiwyg h4,
.mbr-article--wysiwyg h5,
.mbr-article--wysiwyg h6 {
  color: #252525;
  display: block;
  font-weight: bold;
  line-height: 1.3em;
  text-align: left;
}
.mbr-article--wysiwyg h1 {
  font-size: 27px;
  letter-spacing: 3px;
}
.mbr-article--wysiwyg h2 {
  font-size: 23px;
  letter-spacing: 2px;
}
.mbr-article--wysiwyg h3 {
  font-size: 19px;
  letter-spacing: 1px;
}
.mbr-article--wysiwyg h4 {
  font-size: 14px;
}
.mbr-article--wysiwyg h5 {
  font-size: 11px;
}
.mbr-article--wysiwyg h6 {
  font-size: 10px;
}
.mbr-article--wysiwyg p,
.mbr-article--wysiwyg ul,
.mbr-article--wysiwyg ol,
.mbr-article--wysiwyg blockquote {
  margin: 0 0 10px 0;
}
.mbr-article--wysiwyg blockquote {
  font-size: 17px;
  border-color: #f97352;
}
@media (max-width: 767px) {
  .mbr-article--auto-align.mbr-article--wysiwyg p,
  .mbr-article--auto-align {
    text-align: left !important;
  }
}
.social-likes__counter {
  -webkit-transition: all 0.2s ease-in-out 0s;
  -o-transition: all 0.2s ease-in-out 0s;
  transition: all 0.2s ease-in-out 0s;
  background: #3c3c3c;
  border-radius: 23px;
  font-size: 12px;
  height: 23px;
  line-height: 24px;
  min-width: 23px;
  padding: 0 5px;
  position: absolute;
  right: -7px;
  text-align: center;
  top: -7px;
}
.social-likes__counter_empty {
  display: none;
}
.social-likes_style-1 .social-likes__icon:hover {
  background: #252525 !important;
}
.social-likes_style-1 .social-likes__icon:hover .social-likes__counter {
  background: #f97352;
}
.social-likes_style-2 .social-likes__icon {
  background: #252525;
}
.social-likes_style-2 .social-likes__counter {
  background: #f97352;
}
.social-likes_style-2 .social-likes__icon:hover .social-likes__counter {
  background: #3c3c3c;
}
.mbr-plan {
  padding-bottom: 41px;
  padding-left: 1px;
  padding-right: 0;
  position: relative;
}
.mbr-plan--first,
.mbr-plan:first-child {
  padding-left: 0;
}
.mbr-plan--last,
.mbr-plan:last-child {
  padding-bottom: 93px;
}
.mbr-plan__box {
  background: #fff;
}
.mbr-plan__header {
  background: #444;
  overflow: hidden;
  padding: 20px 15px;
  color: #fff;
}
.mbr-plan__number {
  border-bottom: 1px dotted #ddd;
  color: #333;
  font-size: 80px;
  line-height: 0;
  margin: 0px 10px;
  padding: 41px 0;
  text-align: center;
  margin-bottom: 41px;
}
.mbr-plan__details {
  padding-bottom: 41px;
}
.mbr-plan__details ul,
.mbr-plan__list {
  list-style: none;
  margin: 0;
  padding: 0;
}
.mbr-plan__details li,
.mbr-plan__item {
  line-height: 40px;
  padding: 0 15px;
  text-align: center;
}
.mbr-plan__buttons {
  overflow: hidden;
  padding: 0 15px 41px;
}
.mbr-plan--favorite {
  margin-right: -1px;
  margin-top: -30px;
  padding-left: 0;
  top: 15px;
  z-index: 5;
}
.mbr-plan--favorite .mbr-plan__number:before {
  content: "";
  display: block;
  height: 15px;
}
.mbr-plan--favorite .mbr-plan__box {
  padding-bottom: 15px;
  box-shadow: 0px 0px 20px 5px rgba(0, 0, 0, 0.1);
}
.mbr-plan--primary .mbr-plan__header {
  background: #4c6972;
}
.mbr-plan--success .mbr-plan__header {
  background: #7ac673;
}
.mbr-plan--info .mbr-plan__header {
  background: #27aae0;
}
.mbr-plan--warning .mbr-plan__header {
  background: #faaf40;
}
.mbr-plan--danger .mbr-plan__header {
  background: #f97352;
}
@media (max-width: 767px) {
  .mbr-plan,
  .mbr-plan--first,
  .mbr-plan:first-child {
    padding-left: 15px;
    padding-right: 15px;
  }
  .mbr-plan__number {
    font-size: 79px;
  }
  .mbr-plan__details {
    font-size: 17px;
  }
  .mbr-plan--favorite {
    margin: 0;
    top: 0;
  }
}
.mbr-number {
  display: inline-block;
  margin-top: -0.12em;
}
.mbr-number__num {
  display: inline-table;
  height: 1em;
}
.mbr-number__group {
  display: table-cell;
  font-weight: bold;
  position: relative;
  vertical-align: middle;
}
.mbr-number__left {
  display: none;
  font-size: 0.34em;
  line-height: 0;
  padding: 0px 5px;
  vertical-align: super;
}
.mbr-number__right {
  display: none;
  font-size: 0.25em;
  padding: 0px 5px;
  vertical-align: middle;
  white-space: nowrap;
}
.mbr-number__caption {
  display: block;
  font-size: 0.19em;
  line-height: 1em;
  opacity: 0.5;
  padding-top: 0.5em;
  text-align: center;
}
.mbr-number--price .mbr-number__value {
  padding-right: 0.28em;
}
.mbr-number--price .mbr-number__left {
  display: inline;
}
.mbr-number--short-price .mbr-number__left,
.mbr-number--short-price .mbr-number__right {
  display: inline;
}
.mbr-number--short-price .mbr-number__caption {
  display: none;
}
.mbr-number--inverse-price .mbr-number__group {
  top: 0.1em;
}
.mbr-number--inverse-price .mbr-number__left {
  display: none;
}
.mbr-number--inverse-price .mbr-number__value {
  padding-left: 0.28em;
}
.mbr-number--inverse-price .mbr-number__right {
  display: inline;
}
.engine {
    position: absolute;
    text-indent: -2400px;
    text-align: center;
    padding: 0;
}



</style>

@section('content')


<section class="mbr-slider mbr-section mbr-section--no-padding carousel slide" data-ride="carousel" data-wrap="true" data-interval="5000" id="slider-5" style="background-color: #4c6972;">
    <div class="overlay"></div>
    <div class="mbr-section__container">

        <div>
            <ol class="carousel-indicators">
              @foreach($slider as $key=>$val)
            <li data-app-prevent-settings="" data-target="#slider-5" data-slide-to="{{$key}}" class="@if($key==0)active @endif"></li>
                @endforeach
            </ol>
            <div class="carousel-inner" role="listbox">


              @if(sizeof($slider) > 0)
             @foreach($slider as $key=>$val)
                <div class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--bg-adapted item dark center mbr-section--full-height @if($key==0)active @endif" style="background-image: url({{asset('assets/admin/img/slider/'.$val->image)}});">
                    <div class="mbr-box__magnet mbr-box__magnet--center-center mbr-box__magnet--sm-padding">

                        <div class=" container">

                            <div class="row">
                                <div class=" col-md-8 col-md-offset-2">

                                <div class="mbr-hero">
                                    <h1 class="mbr-hero__text">{{$val->heading}}</h1>

                                    <p class="mbr-hero__subtext">{{$val->paragraph}}</p>
                                </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--bg-adapted item dark center mbr-section--full-height active" style="background-image: url({{asset('assets/admin/img/slider/slider.jpg')}});">
                    <div class="mbr-box__magnet mbr-box__magnet--center-center mbr-box__magnet--sm-padding">

                        <div class=" container">

                            <div class="row">
                                <div class=" col-md-8 col-md-offset-2">

                                <div class="mbr-hero">
                                    <h1 class="mbr-hero__text">When mom says no kitchen</h1>

                                    <p class="mbr-hero__subtext">Food is everything we are. It’s an extension of nationalist feeling, ethnic feeling, your personal history, your province, your region, your tribe, your grandma. It’s inseparable from those from the get-go.</p>
                                </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

            </div>

            <a data-app-prevent-settings="" class="left carousel-control" role="button" data-slide="prev" href="#slider-5" style="display: none">
                <span aria-hidden="true"><</span>
                <span class="sr-only">Previous</span>
            </a>
            <a data-app-prevent-settings="" class="right carousel-control" role="button" data-slide="next" href="#slider-5" style="display: none">
                <span aria-hidden="true">></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>






    @if(sizeof($plans) > 0)
    <!--Start Plans Area-->
    <section class="gallery-area bg-gray default-padding">
        <!--Start Container-->
        <div class="container">
            <!--Start Section Heading-->
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-heading text-center">
                        <h3 class="section-title-heading color-main">List Of Plans</h3>
                        <h2 class="section-title-subtitle">Categories</h2>
                    </div>
                </div>
            </div>
            <!--End Section Heading-->

            <!--Start Gallery List-->
            <div class="gallery-list">
                <!--Start Row-->
                <div class="row">
                @foreach($plans as $plan)
                    <!--Start Post Single-->
                        <div class="col-md-4 col-xs-12">
                            <div class="blog-post-single fix" style="box-shadow: 0 0 10px #bcc6d0;">
                                <div class="post-media lfood">
                                    <a href="{{route('user.cat_plans',['id'=>$plan->id])}}">

                                            <img src="@if($plan->category_image!=''){{asset('assets/user/images/plans/'.$plan->category_image)}} @else {{asset('assets/user/images/meal/noimage.png')}} @endif"
                                                 class="img-responsive" alt="Image">

                                    </a>
                                </div>
                                <div class="blog-details">
                                    <div class="post-meta">

                                        <h2 class="m-0" style="text-align: center;"><a href="{{route('user.cat_plans',['id'=>$plan->id])}}">{{$plan->category_name}}</a></h2>

                                    </div>
                                    <div class="post-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="default-btn" style="margin: 10px 0 0 !important;">
                                                    <a href="{{route('user.cat_plans',['id'=>$plan->id])}}" class="btn btn-block" style="color: #fff !important;">View Plans</a>
                                                </div>
                                            </div>
                                        </div>
                                        {{--<a href="blog-single.html">View Details <i class="icofont icofont-rounded-double-right"></i></a>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Post Single-->
                    @endforeach

                </div>
                <!--End Row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="default-btn text-center">
                            <a href="{{route('user.listplancategories')}}">@lang('See More')</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Gallery List-->



        </div>
        <!--End Container-->
    </section>
    <!--End Plans Area-->
    @endif


    @if(sizeof($optionsplans) > 0)
    <!--Start Plans Options Area-->
    <section class="gallery-area bg-gray default-padding">
        <!--Start Container-->
        <div class="container">
            <!--Start Section Heading-->
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-heading text-center">
                        <p class="section-title-heading color-main">List Of Plans Options</p>
                        <h2 class="section-title-subtitle">Categories</h2>
                    </div>
                </div>
            </div>
            <!--End Section Heading-->

            <!--Start Gallery List-->
            <div class="gallery-list">
                <!--Start Row-->
                <div class="row">
                @foreach($optionsplans as $plan)
                    <!--Start Post Single-->
                        <div class="col-md-4 col-xs-12">
                            <div class="blog-post-single fix" style="box-shadow: 0 0 10px #bcc6d0;">
                                <div class="post-media lfood">
                                    <a href="{{route('user.cat_planoptions',['id'=>$plan->id])}}">

                                            <img src="@if($plan->category_image!=''){{asset('assets/user/images/planoptions/'.$plan->category_image)}} @else {{asset('assets/user/images/meal/noimage.png')}} @endif"
                                                 class="img-responsive" alt="Image">

                                    </a>
                                </div>
                                <div class="blog-details">
                                    <div class="post-meta">

                                        <h2 class="m-0" style="text-align: center;"><a href="{{route('user.cat_planoptions',['id'=>$plan->id])}}">{{$plan->category_name}}</a></h2>

                                    </div>
                                    <div class="post-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="default-btn" style="margin: 10px 0 0 !important;">
                                                    <a href="{{route('user.cat_planoptions',['id'=>$plan->id])}}" class="btn btn-block" style="color: #fff !important;">View Plans Options</a>
                                                </div>
                                            </div>
                                        </div>
                                        {{--<a href="blog-single.html">View Details <i class="icofont icofont-rounded-double-right"></i></a>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Post Single-->
                    @endforeach

                </div>
                <!--End Row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="default-btn text-center">
                            <a href="{{route('user.listplansoptionscat')}}">@lang('See More')</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Gallery List-->



        </div>
        <!--End Container-->
    </section>
    <!--End Plans Options Area-->
    @endif







    <!--Start Gallery Area-->
    <section class="gallery-area bg-gray default-padding">
        <!--Start Container-->
        <div class="container">
            <!--Start Section Heading-->
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-heading text-center">
                        <h3 class="section-title-heading color-main">{{!empty($frontEndSetting->featureTitle1) ? __($frontEndSetting->featureTitle1) : ''}}</h3>
                        <h2 class="section-title-subtitle">{{!empty($frontEndSetting->featureTitle2) ? __($frontEndSetting->featureTitle2) : ''}}</h2>
                    </div>
                </div>
            </div>
            <!--End Section Heading-->

            <!--Start Gallery List-->
            <div class="gallery-list">
                <!--Start Row-->
                <div class="row">
                @foreach($foodItems as $foodItem)
                    <!--Start Post Single-->
                        <div class="col-md-4 col-xs-12">
                            <div class="blog-post-single fix" style="box-shadow: 0 0 10px #bcc6d0;">
                                <div class="post-media lfood">
                                    <a href="{{route('user.foodDetails',$foodItem->id)}}">

                                        @foreach(explode(',', $foodItem->food_image) as $f_image)

                                            <img src="{{asset('assets/user/images/foods/'.$f_image)}}"
                                                 class="img-responsive" alt="Image">

                                            @if($loop->iteration==1)
                                                @break;
                                            @endif
                                        @endforeach

                                    </a>
                                </div>
                                <div class="blog-details">
                                    <div class="post-meta">
                                        <p>
                                            <a href=""><i class="icofont icofont-clock-time"></i> {{$foodItem->created_at->format('M d, Y')}}</a>
                                        </p>
                                        <h2 class="m-0"><a href="{{route('user.foodDetails',$foodItem->id)}}">{{__($foodItem->food_name)}}</a></h2>

                                    </div>
                                    <div class="post-content">
                                        <p>
                                            {{ \Illuminate\Support\Str::words(__($foodItem->food_description), 12,'....') }}
                                        </p>
                                        <div class="row">
                                            <div class="col-md-6" style="margin-top: 50px;">
                                                <b>Price : </b> <span class="base-color">{{$gs->currencySymbol}} {{$foodItem->food_price}}</span>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="default-btn">
                                                    <a href="{{route('user.foodDetails',$foodItem->id)}}" style="color: #fff !important;">View
                                                        Details</a>
                                                </div>
                                            </div>
                                        </div>
                                        {{--<a href="blog-single.html">View Details <i class="icofont icofont-rounded-double-right"></i></a>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Post Single-->
                        @if($loop->iteration==6)
                            @break;
                        @endif
                    @endforeach

                </div>
                <!--End Row-->
                <div style="clear:both"></div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="default-btn text-center">
                            <a href="{{route('user.foods')}}">@lang('See More')</a>
                        </div>
                    </div>
                </div>

            </div>
            <!--End Gallery List-->



        </div>
        <!--End Container-->
    </section>
    <!--End Gallery Area-->


    @if(sizeof($events) > 0)
    <!--Start Event Area-->
    <section class="event-area default-padding">
        <!--Start Container-->
        <div class="container">
            <!--Start Section Heading-->
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-heading text-center">
                        <h3 class="section-title-heading color-main">{{ !empty($frontEndSetting->eventTitle1) ?  __($frontEndSetting->eventTitle1) : '' }}</h3>
                        <h2 class="section-title-subtitle">{{ !empty($frontEndSetting->eventTitle2) ?  __($frontEndSetting->eventTitle2) : '' }}</h2>
                    </div>
                </div>
            </div>
            <!--End Section Heading-->

            <!--Start Row-->
            <div class="row">
            @foreach($events as $event)
                <!--Start Event Single-->
                    <div class="col-md-6">
                        <div class="event-single position-relative">
                            <img src="{{asset('assets/user/images/events/'.$event->event_image)}}"
                                 class="img-responsive" alt="Image">
                            <div class="event-details">
                                <a href="{{route('user.EventDetails',$event->event_slug)}}">
                                    <h2>{{__($event->event_title)}}</h2>
                                </a>
                                <p><span><i class="icofont icofont-calendar"></i> {{$event->event_date}}</span> <span><i
                                                class="icofont icofont-clock-time"></i> {{$event->event_duration}}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--End Event Single-->
                    @if($loop->iteration==2)
                        @break;
                    @endif
                @endforeach
            </div>
            <!--End Row-->

            <div class="default-btn text-center">
                <a href="{{route('user.event')}}">@lang('More Event')</a>
            </div>
        </div>
        <!--End Container-->
    </section>
    <!--End Event Area-->
    @endif


    @if(sizeof($testimonials) > 0)
    <!--Start Testimonial Area-->
    <section class="testimonial-area bg-cover position-relative"
             style="background-image: url({{asset('assets/user/images/frontEnd/banner.png')}});">
        <div class="overlay"></div>

        <!--Start Container-->
        <div class="container">
            <!--Start Row-->
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <!--Start Testimonial Carousel-->
                    <div class="testi-carousel owl-carousel">

                    @foreach($testimonials as $testimonial)
                        <!--Start Testimonial Single-->
                            <div class="testi-single">
                                <div class="client-info text-center">
                                    <img src="{{asset('assets/user/images/testimonial/'.$testimonial->profile_photo)}}"
                                         class="img-responsive" alt="Image">
                                    <h4>{{$testimonial->name}}</h4>
                                </div>
                                <div class="client-comment text-center">
                                    <p>{{__($testimonial->message)}}</p>
                                    <span><i class="icofont icofont-star"></i><i class="icofont icofont-star"></i><i
                                                class="icofont icofont-star"></i><i class="icofont icofont-star"></i><i
                                                class="icofont icofont-star"></i></span>
                                </div>
                            </div>
                            <!--End Testimonial Single-->

                        @endforeach

                    </div>
                </div>
                <!--End Testimonial Carousel-->
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->

    </section>
    <!--End Testimonial Area-->
    @endif

    @if(sizeof($chefs) > 0)
    <!--Start Chef Area-->
    <section class="chef-area default-padding">
        <!--Start Container-->
        <div class="container">
            <!--Start Section Heading-->
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-heading text-center">
                        <h3 class="section-title-heading color-main">{{ !empty($frontEndSetting->chefTitle1) ?  __($frontEndSetting->chefTitle1) : '' }}</h3>
                        <h2 class="section-title-subtitle">{{ !empty($frontEndSetting->chefTitle2) ?  __($frontEndSetting->chefTitle2) : '' }}</h2>
                    </div>
                </div>
            </div>
            <!--End Section Heading-->

            <!--Start Row-->
            <div class="row">

            @foreach($chefs as $chef)
                <!--Start Chef Single-->
                    <div class="col-md-3 col-sm-6">
                        <div class="chef-single text-center position-relative">
                            <img src="{{asset('assets/user/images/chefs/'.$chef->profile_photo)}}"
                                 class="img-responsive" alt="Image">
                            <div class="chef-social">
                                <ul>
                                    <li><a href="{{$chef->facebook}}" target="_blank"><i
                                                    class="icofont icofont-social-facebook"></i></a></li>
                                    <li><a href="{{$chef->twitter}}" target="_blank"><i
                                                    class="icofont icofont-social-twitter"></i></a></li>
                                    <li><a href="{{$chef->pinterest}}" target="_blank"><i
                                                    class="icofont icofont-social-pinterest"></i></a></li>
                                    <li><a href="{{$chef->linkedin}}" target="_blank"><i
                                                    class="icofont icofont-brand-linkedin"></i></a></li>
                                </ul>
                            </div>
                            <div class="chef-info">
                                <h4>{{$chef->name}}</h4>
                                <p>{{$chef->designation}}</p>
                            </div>
                        </div>
                    </div>
                    <!--End Chef Single-->
                @endforeach


            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
    <!--End Chef Area-->
    @endif



@endsection




