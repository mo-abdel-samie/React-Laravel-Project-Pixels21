import React from 'react'

export default function PixelsAdmin() {

    function handleVideoClick () {
        let vedioIframe = document.querySelector('#vedioSrc');
        vedioIframe.src = "https://www.youtube.com/embed/bUPYpXQhfe0";

    }
    function removeStc () {
        let vedioIframe = document.querySelector('#vedioSrc');
        vedioIframe.src = "";

    }


    return (
        <section className = "Admin about pt-3 pb-5 pt-3 mt-0" style={{backgroundColor:"#3a4d8f",color:"#e3dce8 !important"}}>
            <div className=" container">

                <div className="row">
                    <div className="col-12 text-center mb-5">
                        <h2 className="mb-2 text-white">OUR SUPERVISOR</h2>
                    </div>

                    <div  className="col-lg-6 text-center align-items-center justify-content-center d-flex">
                        <div>
                            <img src="/images/dr_roaa.jpg" alt="Pixels" style={{height:"350px",width:"350px"}} className=" img-fluid rounded-circle dr-roaa mb-3"/>
                            <h3 className=" text-white">Dr.Roaa</h3>
                        </div>
                    </div>

                    <div className="col-lg-6 video-image" style={{backgroundImage:"url(/images/drProaa2.jpg)",backgroundSize:"cover",backgroundPosition:"center",height:"387px"}}>
                        <p>
                            <i onClick={handleVideoClick} data-toggle="modal" data-target="#showvideo" className="fa fa-play bg-secondary"></i>
                        </p>
                    </div>
                </div>
            </div>

             {/* Modal  */}
             <div onClick={removeStc} className="modal fade" id="showvideo" tabIndex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div className="modal-dialog modal-dialog-centered customeVideoWidth">
                        <div className="modal-content w-100">



                                <button type="button" className="close text-white customeTimes" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                </button>


                            <div className="modal-body p-0" style={{height:"60vh"}}>
                                <iframe title="Dr.Roaa's Word" id="vedioSrc" width="100%" height="100%" src="https://www.youtube.com/embed/bUPYpXQhfe0" frameBorder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowFullScreen></iframe>
                            </div>

                        </div>
                    </div>
                </div>
        </section>
    )
}
