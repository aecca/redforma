/**
 * connect.js
 * @author Juan Pablo <juanpablocs21@gmail.com>
 */

import './connect.scss';

import $ from 'jquery';
import validationAuth from './../../validations/auth';

class ConnectAction
{
	constructor(){
		this.st = {};
		this.dom = {};
		this.st.form = 'form';

		this.catchDom();
		this.suscribeEvents();
	}

	catchDom(){
		$.fn.form 		= require('semantic-ui-form');
		this.dom.form = $(this.st.form);
	}
	
	suscribeEvents(){
		this.dom.form.form({
			on:'blur',
			// inline:true,
			fields:validationAuth
		});
	}

	events(){

	}
}

export default ConnectAction;