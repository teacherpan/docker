FROM maven:3.6-openjdk-8

SHELL [ "/bin/bash", "-c" ]

WORKDIR /root

ENV NVM_DIR /usr/local/nvm
ENV NODE_VERSION 14.16.0
RUN mkdir -p $NVM_DIR 
COPY ./install.sh /root/
RUN bash /root/install.sh

# When you RUN bash... each time that runs in a separate process, anything set in the environment is not maintained. 
# https://stackoverflow.com/questions/25899912/how-to-install-nvm-in-docker
RUN source $NVM_DIR/nvm.sh \
    && nvm install $NODE_VERSION \
    && nvm alias default $NODE_VERSION \
    && nvm use default

ENV NODE_PATH $NVM_DIR/v$NODE_VERSION/lib/node_modules
ENV PATH $NVM_DIR/versions/node/v$NODE_VERSION/bin:$PATH

# confirm installation
RUN node -v
RUN npm -v