import './form.css'
import React, { useRef } from 'react';

const FormPassword = ({ email }) => {


    
    const handleSubmit = (event) => {

    }



    
    return(
        <>
        <form onSubmit={handleSubmit}>
                <h1>{ email }</h1>
                <input
                    id="password"
                    type="password"
                    placeholder="Password"  
                    
                    required
                    />
                
                <div className="remember-me">
                        <input type="checkbox" id="remember"/>
                        <label htmlFor="remember">Remember me</label>
                    </div>
                <input type="submit" value="Next" id="next" />
            </form>
        </>
    )


}

export default FormPassword;