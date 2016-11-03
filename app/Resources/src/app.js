/**
 * @author Juan Pablo <juanpablocs21@gmail.com
 * @date 16/09/16.
 */

import 'semantic-ui-css/semantic.css';
import './app.scss';


import Routes from 'jp-router';
import {hello} from './utils/helpers';

//actions
import HomeAction from './actions/home/home';
import UserConnectAction from './actions/user/connect';
import PublicationAction from './actions/publication/publication';

// app
const App = new Routes({location:window.location.pathname,debug:true});

App.map('/', HomeAction);
App.map('/user/connect', UserConnectAction);
App.map('/publication', PublicationAction);
// app.map('/serie/(.+)', (serie)=>{
//     loadAsyncModule('pages/serie', (serie)=>serie.show());
// });