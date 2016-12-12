# psse
PHP server-sent event

A simple class to stream directly to the browser.

This techonlogy allows you keep a one-way channel open between server-client with no need of sockets which allow push messages to you client over http.

# Specs at :
https://html.spec.whatwg.org/multipage/comms.html#server-sent-events


# Implementation

An easy integration can be found at example dir, which comes with a raw javascript showing how to use and call it.


# Features

* Control the infinite loop
* Standar way to send data
* Auto close server connection when no one listen to it
* Nice JS example :D

