import React from 'react';
import { useEffect } from 'react';
import Aos from "aos";

export default function Header() {

    useEffect(() => {
        Aos.init({duration: 2000});
    }, []);

    return (
        <section data-aos="zoom-in" className="magazin-header " style={{ backgroundImage:"url(/images/MagazineImg/space.jpg)" }}>
            <div className="container h-100">
                <div className="row h-100">
                    <div className="col-12 align-self-center text-center">
                        <img src="/images/MagazineImg/VOXEL_logo.png" style={{height:"10em"}} alt="Voxel" />
                        <h2 className=" font-weight-bold text-white text-uppercase">VOXEL</h2>
                    </div>
                </div>
            </div>
        </section>
    )
}
