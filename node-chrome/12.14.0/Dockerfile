FROM node:12.14-stretch
RUN apt-get update
RUN wget https://dl.google.com/linux/direct/google-chrome-stable_current_amd64.deb
RUN apt install -y ./google-chrome*.deb;
RUN export CHROME_BIN=/usr/bin/google-chrome
RUN apt install -y vim
RUN npm install -g @angular/cli
RUN apt-get clean