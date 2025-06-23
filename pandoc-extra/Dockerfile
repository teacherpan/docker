# 使用 pandoc/extra:3-ubuntu 作为基础镜像
FROM pandoc/extra:3-ubuntu

# 更新并安装 texlive-xetex 和相关字体包
RUN apt-get update && \
    apt-get install -y \
    texlive-xetex \
    texlive-fonts-recommended \
    texlive-fonts-extra && \
    fonts-noto-cjk && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# 设置默认工作目录
WORKDIR /workspace

# 默认命令（可选）
ENTRYPOINT [""]
CMD ["--help"]