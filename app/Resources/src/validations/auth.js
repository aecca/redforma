
export default {
	name:{
		rules:[{
			type   : 'empty', 
			prompt : 'Por favor ingresa tu nombre'
		}]
	},
	email:{
		identifier:'user_login[email]',
		rules:[
			{
				type   : 'email', 
				prompt : 'Por favor ingresa un Correo Electrónico válido'
			}
		]
	},
	password:{
        identifier:'user_login[password]',
		rules:[
			{
				type:'empty',
				prompt:'Por favor ingresa tu contraseña'
			}
		]
	},
	password2:{
		rules:[
			{
				type:'match[password]',
				prompt:'la contraseña no coincide'
			}
		]
	}
};