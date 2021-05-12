import React, { useEffect, useState } from 'react'
import Aos from "aos";
import { Link } from 'react-router-dom';
import { axios } from '../../../axios';


export default function ProjectBlock() {

    const [propjects, setPropjects] = useState(0);

    useEffect(() => {
        Aos.init({duration: 2000});

        (async () => {
            const { data }  = await axios.get('/get-project-details');
            setPropjects( data.project );
        })();

    }, []);

    return (
        <section className="propjects overflow-hidden">
            <div className = " container">
                {/* <div className="row">
                    <div className="col-12 py-3 pt-5">
                        <div className="pixels-word" style={{top:"-3px"}}>Pixels</div>
                        <h2>Our Projects</h2>
                    </div>

                    <div data-aos="fade-right" className = "col-lg-6 d-flex pl-5 align-items-center">
                        <div>
                            <h3> In Pixels </h3>
                            <p>
                                project commetie word
                            </p>
                        </div>
                    </div>

                    <div data-aos="fade-left" className = "col-lg-6  ">
                        <img alt="pixels articel" src="/images/car.jpg" className = "m-2 img-fluid rounded" />
                    </div>

                </div> */}

                <div className="row overflow-hidden py-3">
                    <div className="col-12">
                        <h2>Our Propjects</h2>
                    </div>

                    {(propjects !==0 )?
                        propjects.map((project , index)=>(
                            <div key={index} data-aos="fade-up" className="col-lg-4 mb-2">
                                <div className="card">
                                    <img alt="pixels articel" className="card-img-top" src={`/images/${project.img}`} />
                                    <div className="card-body ">
                                        <p className="card-text">
                                            {project.description}
                                        </p>
                                    </div>

                                    <Link to={`/project/${project.id}`} className="btn btn-outline-info rounded-pill mx-4 mb-3">Go to {project.title}</Link>

                                </div>
                            </div>
                    )) : "Loading..." }

                </div>

            </div>
        </section>
    )
}
