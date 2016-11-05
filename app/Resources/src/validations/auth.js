
export default {
	name:{
		rules:[{
			type   : 'empty', 
			prompt : 'Por favor ingresa tu nombre'
		}]
	},
	email:{
		rules:[
			{
				type   : 'email', 
				prompt : 'Por favor ingresa un Correo Electrónico válido'
			}
		]
	},
	password:{
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