FROM maven:3.6-openjdk-8
RUN apt update
RUN apt install curl -y
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.1/install.sh | bash \
    && . /root/.nvm/nvm.sh
RUN nvm install 14.16.0
RUN apt clean
RUN node -v
RUN npm -v
