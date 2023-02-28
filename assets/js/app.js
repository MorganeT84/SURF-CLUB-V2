/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// ./src/js/app.js

import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter } from 'react-router-dom';

// any CSS you import will output into a single css file (app.css in this case)
import '../styles/app.scss';

// start the Stimulus application
import '../bootstrap';

import { registerReactControllerComponents } from '@symfony/ux-react';
registerReactControllerComponents(require.context('./components', true, /\.(j|t)sx?$/));

import App from './components/App/index';


ReactDOM.render(
  <BrowserRouter>
    <App />
  </BrowserRouter>,
  document.getElementById('root')
);
