// 3rd party packages from NPM
import $ from 'jquery';
import slick from 'slick-carousel';

// Our modules / classes
import MobileMenu from './modules/MobileMenu';
import HeroSlider from './modules/HeroSlider';
import GoogleMap from './modules/GoogleMap';
import Search from './modules/Search';
// added for testing
import './modules/SearchVue';

// Instantiate a new object using our modules/classes
var mobileMenu = new MobileMenu();
var heroSlider = new HeroSlider();
var googleMap = new GoogleMap();
// new Search();