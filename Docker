FROM php:7.1.1-apache

RUN apt-get update && apt-get install -y git

RUN git clone https://github.com/spansare/Microservices-UI-Container
RUN cp Microservices-UI-Container/* .
RUN rm -rf Microservices-UI-Container/
