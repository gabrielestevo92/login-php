import './form.css'
import '../login/login.css'
import logo from "../../assets/Bootstrap_logo.svg.png"
import React, { useEffect, useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { useForm } from "react-hook-form";
import axios from 'axios';


const FormRegister = ( {email} ) => {

    
    const [error, setError] = useState(null);

    
    const { register, handleSubmit, formState: {errors} } = useForm()

    const navigate = useNavigate();
    const onSubmitSignup = async(event) => {

        const postEmail = {
            "name": event.name,
            "email": email,
            "password": event.createpassword,
            "cod": event.code
        }
        try {
            const response = await axios.post('http://127.0.0.1:8000/api/signup', postEmail);
            
            if (response.data.status) {
                navigate('/');
            } else {
                setError(response.data.message);
            }
        } catch (err) {
            setError(err.message);
        }
    }

    

    
    return(
        <>
        <img src={logo} width={50}/>
        <form onSubmit={handleSubmit(onSubmitSignup)}>
                <h1>{ email }</h1>
                <label htmlFor="name">Name:</label>
                <input
                    id="name"
                    type='text'
                    placeholder="Enter your name..."
                    required
                    {...register("name", { required: "O nome é obrigatório" })} // Usando o register
                />
                
                <label htmlFor="code">Code:</label>
                <input
                    id="code"
                    type="text" 
                    placeholder='Enter the code sent by email...'
                    required
                    {...register("code", { required: "O código é obrigatório" })} // Usando o register
                />
                {error}

                <label htmlFor="createpassword">Password:</label>
                <input
                    id="createpassword"
                    type='password' 
                    placeholder='Create a password...'
                    required
                    {...register("createpassword", { required: "A senha é obrigatória" })} // Usando o register
                />
                

                <input type="submit" value="Next" id="next" />
            </form>
           
            <span>&copy; 2017-2024</span>
        </>
    )


}

export default FormRegister;