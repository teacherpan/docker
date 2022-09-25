FROM maven:3.6-openjdk-8

SHELL [ "/bin/bash", "-c" ]

WORKDIR /root
COPY ./install.sh /root/
RUN bash /root/install.sh
RUN export NVM_DIR="$HOME/.nvm" && \
    [ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh" && \
    nvm install 14.16.0 && \
    nvm use 14.16.0 && node -v && npm -v