
console.log('Welcome from index.js');
$(document).ready(function() {
    new Buttons();
    //stuff added after error
    new Simon('#simon');
});
import $ from 'jquery';
import {Buttons} from './Buttons';
import './_clicker.scss';

//stuff added after error
import './_simon.scss';
import {Simon} from './Simon';