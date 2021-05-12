import React from 'react'

export default function WhatIs(props) {
    return (
        <section className = "what-is text-center py-5">
            <h2>WHAT IS VOXEL?</h2>
            <p>{props.definition}</p>
        </section>
    )
}
