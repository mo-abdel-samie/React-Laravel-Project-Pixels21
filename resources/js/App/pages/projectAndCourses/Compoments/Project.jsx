import React, { useEffect, useState } from 'react'
import { useParams } from 'react-router-dom';
import Aos from "aos";
import { axios } from '../../../axios';

import Header from './Header';


export default function Project() {

    let { id } = useParams();
    const [project, setProject] = useState(null);
    const [projectContent, setProjectContent] = useState(null);

    useEffect(() => {
        Aos.init({duration: 2000});

        (async () => {


            let object = {
                id : id
            }

            const { data }  = await axios.post('/get-project-details-id', object);
            setProject( data.project );

            const projectContent  = await axios.get('/get-projects-content', object);
            setProjectContent( projectContent.data.project );

        })();

    }, [])

    return (
        <>

            <Header imgUrl="/images/robots-in-recruitment.jpg" />

            <section className=" container">

                <div className="row">
                    <div className="col-lg-8">
                        {
                            project !== null ?

                                <div className="project_main_details">
                                    <h2>{project.title}</h2>
                                    <img src={`/storage/images/projects/${project.img}`} className="img-fluid" alt="pixels-project" />
                                    <p>
                                        {project.description}
                                    </p>
                                </div>

                            :

                            "loding.."
                        }
                    </div>
                </div>

                        {
                            projectContent !== null ?

                                projectContent.map((project , index)=>(
                                    <div className="container">
                                        <div className="col-lg-12">
                                            {(project.project_id) == id ?
                                                <div key={index} className="project_main_details">


                                                    <h2><a href={project.title_link}>{project.sec_title}</a></h2>

                                                    {
                                                        project.section_imgs &&
                                                        <img src={`/storage/images/projects/${project.section_imgs}`} className="img-fluid" alt={project.sec_title} />
                                                    }

                                                    {
                                                        project.video_link &&

                                                        <div class="embed-responsive embed-responsive-16by9">
                                                            <iframe className="embed-responsive-item" src={project.video_link} title={project.sec_title} allowfullscreen></iframe>
                                                        </div>
                                                    }

                                                    {
                                                        project.body &&
                                                        <p>{project.body}</p>
                                                    }

                                                    {
                                                        project.code &&
                                                        <pre>
                                                            <code className={`language-${project.program_lang}`}>
                                                                {project.code}
                                                            </code>
                                                        </pre>
                                                    }

                                                </div>
                                        :
                                        null
                                        }
                                        </div>
                                    </div>
                                ))

                            :

                            "loding.."
                        }
            </section>

        </>
    )
}
