FROM maven:3.6-openjdk-8

SHELL [ "/bin/bash", "-c" ]

RUN apt update
RUN apt install curl -y
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.1/install.sh | bash
ENV NVM_DIR="/root/.nvm"
RUN . "$NVM_DIR/nvm.sh" && \
    . "$NVM_DIR/bash_completion" && \
    nvm install 14.16.0 && \
    nvm alias default v14.16.0
RUN apt clean

