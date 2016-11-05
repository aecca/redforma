/**
 * connect.js
 * @author Juan Pablo <juanpablocs21@gmail.com>
 */

import './connect.scss';

import $ from 'jquery';

class ConnectAction{
	constructor(){
		this.st = {};
		this.dom = {};
		this.st.form = 'form';
		this.catchDom();
	}

	catchDom(){
		this.dom.form = $(this.st.form);
		console.log(this.dom.form);
	}
	events(){

	}
}

export default ConnectAction;