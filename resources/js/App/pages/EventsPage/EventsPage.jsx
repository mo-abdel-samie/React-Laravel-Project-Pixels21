import React from 'react'
import FullTimeLine from './Components/FullTimeLine'
import Galary from './Components/Galary'
import Header from './Components/Header'
import SeeMagazine from './Components/SeeMagazine'

export default function EventsPage() {
    return (
        <>
            <Header />
            <FullTimeLine />
            <SeeMagazine />
            {/* <Galary /> */}
        </>
    )
}
