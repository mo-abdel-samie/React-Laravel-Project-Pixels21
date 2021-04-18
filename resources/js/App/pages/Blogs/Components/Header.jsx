import React from 'react'
import Aos  from 'aos';
import { useEffect } from 'react';

export default function Header() {
    useEffect(() => {
        Aos.init({duration: 2000});
    }, []);

    return (
        <section data-aos="zoom-in" className="blogs-header" style={{backgroundImage:"url(/images/MagazineImg/sacdsc.jpg)"}}>
            <div className="container h-100">
                <div className="row h-100">
                    <div className="col-12 align-self-center text-center">
                        <img src="/images/sloganPixels.png" className="img-fluid" width = "150px" height="150px" />
                        <h2 className=" font-weight-bold text-white">Call Our Writer</h2>
                    </div>
                </div>
            </div>
        </section>
    )
}
