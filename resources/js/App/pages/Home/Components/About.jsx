import React from 'react';
import  Aos  from 'aos';




export default function About() {

    return (
        <>
        <section id="about" className="about container py-5 mb-5" >

            <div className="row">
                
                <div className="about-info col-lg-6 col-12" data-aos="fade-right">
                    <h3 className="section-title1">About US</h3>
                    <span className="line mx-md-auto d-inline-block"></span>
                    <p> 
                        Pixels is a student activity established 6 years ago in helwan University; a non-profit organization, We are a community of makers and ambitious talented engineers, aiming to build a community that believes in science and building instead of consuming, because only by the aid of science and knowledge we can achieve our vision, which is to spread the engineering science, to create a productive community.
                    </p>
                </div>

                <div className="about-images text-center col-lg-6 col-12"> 
                    <div className="imgBox" data-aos="zoom-out" data-aos-duration="500" data-aos-delay="50">
                        <img alt="about" src="/images/home-page/about/about2.jpg" />
                    </div>
                    <div className="imgBox" data-aos="zoom-out" data-aos-duration="500" data-aos-delay="250">
                        <img alt="about" src="/images/home-page/about/about1.jpg" />
                    </div>
                    <div className="imgBox" data-aos="zoom-out" data-aos-duration="500" data-aos-delay="500">
                        <img alt="about" src="/images/home-page/about/about3.jpg" />
                    </div>
                    <div className="imgBox" data-aos="zoom-out" data-aos-duration="500" data-aos-delay="750">
                        <img alt="about" src="/images/home-page/about/about4.jpg" />
                    </div>
                </div>

            </div>

            <div className = "row my-5">
                <div className="col-12 about-video" data-aos="zoom-in">
                    <iframe  title="About Pixels Egypt" width="100%" height="100%" src="https://www.youtube.com/embed/R35_JWMqEd4" frameBorder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowFullScreen></iframe>
                </div>
            </div>

            <div className="row v-m-section">

                <div className="col-lg-6 v-m-heading mb-sm-3" data-aos="fade-up">

                    <label className=" rounded-pill ">What We Do?</label>
                    <h2 className="my-1" >MISSION</h2>
                    <p>
                        Building well qualified members technically and personally so that they could afford responsibility towards the community in their life journey & to effectively develop & enhance the entity on all levels, so it will have a stronger impact over the nation and making effective leaders, able to hold positions in the near future & devoted towards enhancing these committees.
                    </p>

                </div>

                <div className="col-lg-6 v-m-heading" data-aos="fade-up">

                    <label className=" rounded-pill ">What We Aspire To Be?</label>
                    <h2 className="my-1" >VISION</h2>
                    <p>
                        Building strong, conscious and well quailed calibers, & having a creative Arabic society which can improve and produce different new technologies through enriching youth skills.
                    </p>

                </div>

            </div>

        </section>

        </>
    )
}
