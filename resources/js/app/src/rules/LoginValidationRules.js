
const NUMBER = '0123456789';
const UPPERCASE = 'ABCDEFGHIJKLMNOPQWRSTUVXYZ';
const LOWERCASE = 'abcdefghijklmnopqwrstuvxyz';
const SPECIALCHARACTER = "!'^%#()=?@";
const PASSWORD_LENGTH = 8;

const loginValidationRules = {

    email:(email)=>{

        let mensagens = [];

        if (!email || email.trim().length == 0)
        {
            mensagens.push('Obrigatório Informar um e-mail');
        }
    },

    password:(password)=>{

        let mensagens = [];

        if (!password || password.trim().length == 0)
        {
            mensagens.push('Obrigatório Informar a senha');
        }
        if(password && password.length < PASSWORD_LENGTH)
        {
            mensagens.push('A senha deve conter 8 caracteres');
        }

        const hasNumber = [...password].some((char)=>{
            NUMBER.includes(char);
        });

        if (!hasNumber){
            mensagens.push('A senha deve conter pelo menos um número');
        }

        const hasLowerCase = [...password].some((char)=>{
            LOWERCASE.includes(char);
        });

        if (!hasLowerCase){
            mensagens.push('A senha deve conter pelo menos um caractere minúsculo');
        }
    }

}