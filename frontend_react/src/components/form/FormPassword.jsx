import './form.css'
import '../login/login.css'
import logo from "../../assets/Bootstrap_logo.svg.png"
import React, { useEffect, useState } from 'react';
import { useForm } from "react-hook-form";
import axios from 'axios';
import { useNavigate } from 'react-router-dom';
const FormPassword = ({ email }) => {

    const [data, setData] = useState([]);
    const [ isIncorrectPasswordText, setIsIncorrectPasswordText] = useState(false);
    const [error, setError] = useState(null);

    const { register, handleSubmit, formState: {errors} } = useForm()
    const navigate = useNavigate();
    const onSubmitPassword = async(event) => {


        const postEmail = {
            "email": email,
            "password": event.password
        }
        try {
            const response = await axios.post('http://127.0.0.1:8000/api/login', postEmail);
            
            if(response.data.status){
                sessionStorage.setItem('token', response.data.token , { expires: 7 }); 
                const loginTime = new Date().getTime();
                sessionStorage.setItem('loginTime', new Date().toISOString(loginTime) , { expires: 7 }); 
                navigate('/home')
            }
            
        } catch (err) {
            setIsIncorrectPasswordText(true)
            setError(err.message);
        }
    }



    
    return(
        <>
        <img src={logo} width={50}/>
        <form onSubmit={handleSubmit(onSubmitPassword)}>
                <h1>{ email }</h1>
                <input
                    id="password"
                    type="password"
                    placeholder="Password"  
                    required
                    {...register("password", {
                        required: "A senha é obrigatória", // Validação de senha obrigatória
                    })}
                />
                {isIncorrectPasswordText ? <p>Incorrect Password</p>:<></>}
                {errors.password && <p>{errors.password.message}</p>}
                <div className="remember-me">
                        <input type="checkbox" id="remember"/>
                        <label htmlFor="remember">Remember me</label>
                    </div>
                <input type="submit" value="Next" id="next" />
            </form>
            <span>&copy; 2017-2024</span>
        </>
    )


}

export default FormPassword;