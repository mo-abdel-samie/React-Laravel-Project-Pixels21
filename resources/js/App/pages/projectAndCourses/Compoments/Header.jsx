import React from 'react'
import { useEffect } from 'react';
import Aos from "aos";

export default function Header(props) {
    useEffect(() => {
        Aos.init({duration: 2000});
    }, []);
    
    return (
        <section data-aos="zoom-in" className="events-header" style={{backgroundImage:`url(${props.imgUrl})`}}>
            <div className="container h-100">
                <div className="row h-100">
                    <div className="col-12 align-self-center text-center">
                        <img src="/images/sloganPixels.png" className="img-fluid" width = "150px" height="150px" alt="الا ما سعي "/>
                        <h2 className=" font-weight-bold text-white">Pixels' Projects And Contest</h2>
                    </div>
                </div>
            </div>
        </section>
    )
}
