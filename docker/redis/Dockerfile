FROM redis/redis-stack

ARG UID
ARG GID

RUN addgroup --gid $GID redis && \
    adduser --uid $UID --gid $GID --disabled-password --gecos '' redis
USER redis

WORKDIR app