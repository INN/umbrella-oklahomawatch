from tools.fablib import *

from fabric.api import task

"""
Base configuration
"""
env.project_name = 'okwatch'
env.hosts = ['localhost', ]
env.sftp_deploy = True # needed for wpengine
env.domain = 'okwatch.dev'

# Environments
@task
def production():
    """
    Work on production environment
    """
    env.settings    = 'production'
    env.hosts       = [ os.environ[ 'OKWATCH_PRODUCTION_SFTP_HOST' ], ]   # ssh host for production.
    env.user        = os.environ[ 'OKWATCH_PRODUCTION_SFTP_USER' ]        # ssh user for production.
    env.password    = os.environ[ 'OKWATCH_PRODUCTION_SFTP_PASSWORD' ]    # ssh password for production.
    env.domain      = 'okwatch.wpengine.com'
    env.port        = '2222'

@task
def staging():
    """
    Work on staging environment
    """
    env.settings    = 'staging'
    env.hosts       = [ os.environ[ 'OKWATCH_STAGING_SFTP_HOST' ], ]   # ssh host for production.
    env.user        = os.environ[ 'OKWATCH_STAGING_SFTP_USER' ]       # ssh user for production.
    env.password    = os.environ[ 'OKWATCH_STAGING_SFTP_PASSWORD' ]    # ssh password for production.
    env.domain      = 'okwatch.staging.wpengine.com'
    env.port        = '2222'

try:
    from local_fabfile import  *
except ImportError:
    pass
