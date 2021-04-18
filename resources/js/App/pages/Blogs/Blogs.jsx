import React, { useState } from 'react'
import { Link, useParams } from 'react-router-dom'
import './blogs.css'

import Header from './Components/Header'
import Videos from './Components/Videos'
import Articles from './Components/Articles';

export default function Blogs() {


    const [flag, setflag] = useState(false);

    return (
        <>
            <Header />

            { flag === false ?
                <Articles />
                :
                <Videos />
            } 
            
        </>
    )
}
