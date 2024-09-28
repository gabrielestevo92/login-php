import React from "react";
import './form.css'
import { useState } from "react";
import { useForm } from "react-hook-form";
// Componente responsavel pela estrutura de login
const Form = () => {
    const [email, setEmail] = useState("");
    
    // Validação de formulario
    const { register, handleSubmit, formState: {errors} } = useForm()
    
    //Função chamada ao enviar o formulario
    const onSubmit = (event) => {
        alert(event.email)
    }
    return(
        <form onSubmit={handleSubmit(onSubmit)}>
            <h1>Please sign in</h1>  
              
              <input
                id="email"
                type="email"
                placeholder="Email address"
                {...register("email", {
                    required: "O e-mail é obrigatório",                    
                    pattern: {
                    value: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
                    message: "Formato de e-mail inválido"
                    }
                })}
                />
                {errors.email && <p>{errors.email.message}</p>}
            <div className="remember-me">
                <input type="checkbox" id="remember"/>
                <label htmlFor="remember">Remember me</label>
            </div>
           <input type="submit" value="Next" id="next" />
            
        </form> 
    )
}

export default Form;