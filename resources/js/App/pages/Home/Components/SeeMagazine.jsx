import React from 'react'
import { Link } from 'react-router-dom';

export default function SeeMagazine() {
    return (
        <section className="magazinDesign">
            <div className="container">
                <div className="row ">
                    <div className="col-lg-6 boxies text-center pt-5 text-white">
                        <h3 className="mt-5">
                            Magazine
                        </h3>
                        <p>
                            <span className=" text-danger font-weight-bold h3">VOXEL </span> Is the 3D representation of a Pixel Simply like Square and Cube, Cube is the 3D representation of a Square.
                        </p>
                        <Link to="/magazine" className="btn btn-outline-danger rounded-pill" > Visite Magazine </Link>
                    </div>
                    <div className="col-lg-6">
                        <img src="images/VOXEL_logo.png" className=" img-fluid" alt="pixels"/>
                    </div>
                </div>
            </div>
        </section>
    )
}
