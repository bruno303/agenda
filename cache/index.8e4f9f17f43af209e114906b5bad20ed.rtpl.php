<?php if(!class_exists('Rain\Tpl')){exit;}?>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Description
                                </th>
                                <th>
                                    Date
                                </th>
                                <th>
                                    Options
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter1=-1;  if( isset($events) && ( is_array($events) || $events instanceof Traversable ) && sizeof($events) ) foreach( $events as $key1 => $value1 ){ $counter1++; ?>
                            <tr <?php if( $value1["ACTIVE"] != 1 ){ ?>class="danger"<?php } ?>>
                                <td>
                                    <?php echo htmlspecialchars( $value1["ID_EVENT"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars( $value1["DESCRIPTION"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars( $value1["DT_EVENT"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                </td>
                                <td>
                                    <a href="/edeve/<?php echo htmlspecialchars( $value1["ID_EVENT"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><button class="btn btn-sm btn-primary">Edit</button></a>
                                    <?php if( $value1["ACTIVE"] == 1 ){ ?>
                                        <a href="/diseve/<?php echo htmlspecialchars( $value1["ID_EVENT"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><button class="btn btn-sm btn-danger">Disable</button></a>
                                    <?php }else{ ?>
                                        <a href="/eneve/<?php echo htmlspecialchars( $value1["ID_EVENT"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><button class="btn btn-sm btn-danger">Enable</button></a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <a href="/events"><button class="btn btn-default btn-large btn-block">Add Event</button></a>
                </div>
                <div class="col-md-3"></div>
            </div>