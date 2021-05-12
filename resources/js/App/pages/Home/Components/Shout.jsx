import React from 'react'

export default function Shout() {
    return (
        <div className="shout">
            <div className="container  overflow-hidden">
                <div className="row">
                    <div className="col-4 ">
                        <div className="pt-3 d-inline-block">
                            <i className="fas fa-lightbulb fa-2x"></i>
                            <p className="mt-1">learn</p>
                        </div>
                    </div>
                    <div className="col-4 ">
                        <div className="pt-3 d-inline-block">
                            <i className="fas fa-cogs fa-2x"></i>
                            <p className="mt-1">make</p>
                        </div>
                    </div>
                    <div className="col-4 ">
                        <div className="pt-3 d-inline-block">
                            <i className="fas fa-users fa-2x"></i>
                            <p className="mt-1">sheare</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
    )
}
